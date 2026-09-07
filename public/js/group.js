(() => {
    const root = document.documentElement;
    root.classList.add("js");
    const menu = document.querySelector(".menu-toggle");
    const nav = document.querySelector("#navigation");
    const mobile = matchMedia("(max-width: 700px)");
    const reduced = matchMedia("(prefers-reduced-motion: reduce)");
    const toggle = document.querySelector(".motion-toggle");
    const animations = new Set();
    let stored = "on";
    let enabled = false;
    let observer;
    let progressFrame = 0;
    try {
        stored = localStorage.getItem("group-motion") || "on";
    } catch {
        /* Optional storage. */
    }
    const setMenu = (open) => {
        nav.classList.toggle("is-open", open);
        menu.setAttribute("aria-expanded", String(open));
    };
    const resizeMenu = () => {
        menu.hidden = !mobile.matches;
        setMenu(false);
    };
    resizeMenu();
    mobile.addEventListener("change", resizeMenu);
    menu.addEventListener("click", () =>
        setMenu(menu.getAttribute("aria-expanded") !== "true"),
    );
    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            menu.getAttribute("aria-expanded") === "true"
        ) {
            setMenu(false);
            menu.focus();
        }
    });
    const reveal = (element, index) => {
        if (!enabled || !element.animate) return;
        const animation = element.animate(
            [
                { opacity: 0, transform: "translateY(25px)" },
                { opacity: 1, transform: "translateY(0)" },
            ],
            {
                duration: 750,
                delay: (index % 3) * 85,
                easing: "cubic-bezier(.2,.7,.2,1)",
                fill: "backwards",
            },
        );
        animations.add(animation);
        const cleanup = () => animations.delete(animation);
        animation.addEventListener("finish", cleanup, { once: true });
        animation.addEventListener("cancel", cleanup, { once: true });
    };
    const updateProgress = () => {
        progressFrame = 0;
        const distance = root.scrollHeight - innerHeight;
        document.querySelector(".scroll-progress").style.transform =
            "scaleX(" +
            (distance > 0 ? Math.max(0, Math.min(1, scrollY / distance)) : 0) +
            ")";
    };
    const configureMotion = () => {
        enabled = stored !== "off" && !reduced.matches;
        root.classList.toggle("motion-on", enabled);
        toggle.hidden = false;
        toggle.disabled = reduced.matches;
        toggle.textContent = reduced.matches
            ? "Reduced motion"
            : enabled
              ? "Animasi aktif"
              : "Animasi nonaktif";
        toggle.setAttribute("aria-pressed", String(enabled));
        observer?.disconnect();
        animations.forEach((animation) => animation.cancel());
        if (enabled && "IntersectionObserver" in window) {
            observer = new IntersectionObserver(
                (entries) =>
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            reveal(entry.target, index);
                            observer.unobserve(entry.target);
                        }
                    }),
                { threshold: 0.08 },
            );
            document
                .querySelectorAll(".reveal")
                .forEach((element) => observer.observe(element));
        }
        updateProgress();
    };
    toggle.addEventListener("click", () => {
        stored = enabled ? "off" : "on";
        try {
            localStorage.setItem("group-motion", stored);
        } catch {
            /* In-memory preference still works. */
        }
        configureMotion();
    });
    reduced.addEventListener("change", configureMotion);
    configureMotion();
    window.addEventListener(
        "scroll",
        () => {
            if (enabled && !progressFrame)
                progressFrame = requestAnimationFrame(updateProgress);
        },
        { passive: true },
    );
    window.addEventListener("resize", updateProgress, { passive: true });
    document.querySelectorAll(".member-card.available").forEach((card) => {
        let frame = 0;
        card.addEventListener("pointermove", (event) => {
            if (!enabled || event.pointerType !== "mouse") return;
            const rect = card.getBoundingClientRect();
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(() => {
                card.style.setProperty(
                    "--rx",
                    (-(event.clientY - rect.top - rect.height / 2) /
                        rect.height) *
                        5 +
                        "deg",
                );
                card.style.setProperty(
                    "--ry",
                    ((event.clientX - rect.left - rect.width / 2) /
                        rect.width) *
                        5 +
                        "deg",
                );
            });
        });
        const reset = () => {
            cancelAnimationFrame(frame);
            card.style.removeProperty("--rx");
            card.style.removeProperty("--ry");
        };
        card.addEventListener("pointerleave", reset);
        card.addEventListener("pointercancel", reset);
    });
    document.querySelectorAll(".button").forEach((button) =>
        button.addEventListener("click", (event) => {
            if (!enabled || !event.detail) return;
            const rect = button.getBoundingClientRect();
            const ripple = document.createElement("span");
            ripple.className = "ripple";
            ripple.setAttribute("aria-hidden", "true");
            ripple.style.left = event.clientX - rect.left + "px";
            ripple.style.top = event.clientY - rect.top + "px";
            button.append(ripple);
            setTimeout(() => ripple.remove(), 700);
        }),
    );
    document.querySelectorAll('input[name="operasi"]').forEach((input) =>
        input.addEventListener("change", () => {
            document.querySelector(".operation-preview").textContent = {
                tambah: "+",
                kurang: "−",
                kali: "×",
                bagi: "÷",
            }[input.value];
        }),
    );
    document.addEventListener("visibilitychange", () => {
        root.classList.toggle("motion-paused", document.hidden);
        animations.forEach((animation) =>
            document.hidden ? animation.pause() : animation.play(),
        );
    });
})();
