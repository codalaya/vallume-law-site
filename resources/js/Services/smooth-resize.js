const vSmoothResize = {
    mounted(el, binding) {
        let prevRect = el.getBoundingClientRect();
        const duration = binding?.value?.duration ?? 800; // ms
        const easing = binding?.value?.easing ?? "ease";

        const animate = () => {
            const currRect = el.getBoundingClientRect();
            // compute delta from previous → current
            const dx = prevRect.left - currRect.left;
            const dy = prevRect.top - currRect.top;
            const sx = prevRect.width / (currRect.width || 1);
            const sy = prevRect.height / (currRect.height || 1);

            // set from-state (invert)
            el.style.transition = "none";
            el.style.transformOrigin = "top left";
            el.style.transform = `translate(${dx}px, ${dy}px) scale(${sx}, ${sy})`;

            // force reflow
            void el.offsetWidth;

            // play to identity
            el.style.transition = `transform ${duration}ms ${easing}`;
            el.style.transform = "translate(0, 0) scale(1, 1)";

            // update prev for next cycle after anim completes
            clearTimeout(el._srTimer);
            el._srTimer = setTimeout(() => {
                prevRect = el.getBoundingClientRect();
                el.style.transition = ""; // cleanup optional
            }, duration);
        };

        const ro = new ResizeObserver(() => {
            // on any size change, animate from previous → current
            animate();
        });
        ro.observe(el);
        el._srRO = ro;
    },
    unmounted(el) {
        if (el._srRO) el._srRO.disconnect();
        if (el._srTimer) clearTimeout(el._srTimer);
    }
};

export default vSmoothResize;
