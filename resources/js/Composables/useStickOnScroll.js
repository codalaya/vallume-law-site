// composables/useStickOnScroll.js
import { onMounted, onBeforeUnmount } from 'vue';

export function useStickOnScroll(elRef, fixedStyles = {}, threshold = 0) {
    let originalStyles = {};

    const scrollHandler = () => {
        if (!elRef.value) return;
        const rect = elRef.value.getBoundingClientRect();

        if (rect.bottom - threshold > window.innerHeight) {
            // Save original styles once
            if (!originalStyles.position) {
                originalStyles = {
                    position: elRef.value.style.position || '',
                    bottom: elRef.value.style.bottom || '',
                    right: elRef.value.style.right || '',
                    zIndex: elRef.value.style.zIndex || '',
                };
            }

            Object.assign(elRef.value.style, {
                position: 'fixed',
                zIndex: 1000,
                ...fixedStyles,
            });
        } else {
            // Restore original styles
            Object.assign(elRef.value.style, originalStyles);
        }
    };

    onMounted(() => {
        window.addEventListener('scroll', scrollHandler);
        scrollHandler(); // initial check
    });

    onBeforeUnmount(() => {
        window.removeEventListener('scroll', scrollHandler);
    });
}
