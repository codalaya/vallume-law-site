<template>
    <div class="qa-floaties-container">
        <!-- Q&A Bubble 1 -->
        <div class="qa-bubble bubble-1" ref="bubble1">
            <div class="question-bubble user-bubble">
                <div class="bubble-content">
                    <div class="avatar user-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        What are my rights as a tenant?
                    </div>
                </div>
            </div>

            <div class="answer-bubble bot-bubble">
                <div class="bubble-content">
                    <div class="avatar bot-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        <span class="typing-text" ref="typing1">As a tenant, you have the right to a habitable living
                            ...</span>
                        <span class="cursor">|</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Q&A Bubble 2 -->
        <div class="qa-bubble bubble-2" ref="bubble2">
            <div class="question-bubble user-bubble">
                <div class="bubble-content">
                    <div class="avatar user-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        How do I file for divorce?
                    </div>
                </div>
            </div>

            <div class="answer-bubble bot-bubble">
                <div class="bubble-content">
                    <div class="avatar bot-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        <span class="typing-text" ref="typing2">To file for divorce, you'll need to submit a...</span>
                        <span class="cursor">|</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Q&A Bubble 3 -->
        <div class="qa-bubble bubble-3" ref="bubble3">
            <div class="question-bubble user-bubble">
                <div class="bubble-content">
                    <div class="avatar user-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        What is intellectual property?
                    </div>
                </div>
            </div>

            <div class="answer-bubble bot-bubble">
                <div class="bubble-content">
                    <div class="avatar bot-avatar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                        </svg>
                    </div>
                    <div class="bubble-text">
                        <span class="typing-text" ref="typing3">Intellectual property refers to creations of the mind,
                            including inventions, literary works, designs, and symbols used in commerce...</span>
                        <span class="cursor">|</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { gsap } from 'gsap'

export default {
    name: 'LegalQAFloaties',
    mounted() {
        this.initParallaxAnimation()
        this.initTypingAnimation()
    },
    methods: {
        initParallaxAnimation() {
            // Create floating parallax effect for each bubble
            // gsap.to(this.$refs.bubble1, {
            //     y: -20,
            //     x: 10,
            //     rotation: 2,
            //     duration: 4,
            //     ease: "power2.inOut",
            //     repeat: -1,
            //     yoyo: true
            // })

            // gsap.to(this.$refs.bubble2, {
            //     y: 15,
            //     x: -15,
            //     rotation: -1,
            //     duration: 5,
            //     ease: "power2.inOut",
            //     repeat: -1,
            //     yoyo: true,
            //     delay: 1
            // })

            // gsap.to(this.$refs.bubble3, {
            //     y: -10,
            //     x: 20,
            //     rotation: 1.5,
            //     duration: 6,
            //     ease: "power2.inOut",
            //     repeat: -1,
            //     yoyo: true,
            //     delay: 2
            // })

            // Add mouse parallax effect
            const container = this.$el
            container.addEventListener('mousemove', (e) => {
                const { clientX, clientY } = e
                const { innerWidth, innerHeight } = window

                const xPos = (clientX / innerWidth - 0.5) * 20
                const yPos = (clientY / innerHeight - 0.5) * 20

                gsap.to(this.$refs.bubble1, {
                    x: xPos * 0.5,
                    y: yPos * 0.3,
                    duration: 0.5,
                    ease: "power2.out"
                })

                gsap.to(this.$refs.bubble2, {
                    x: xPos * -0.3,
                    y: yPos * 0.4,
                    duration: 0.6,
                    ease: "power2.out"
                })

                gsap.to(this.$refs.bubble3, {
                    x: xPos * 0.4,
                    y: yPos * -0.2,
                    duration: 0.7,
                    ease: "power2.out"
                })
            })
        },

        initTypingAnimation() {
            // Animate cursor blinking
            gsap.to('.cursor', {
                opacity: 0,
                duration: 0.5,
                repeat: -1,
                yoyo: true
            })

            // Simulate typing effect by revealing text gradually
            const typingElements = [this.$refs.typing1, this.$refs.typing2, this.$refs.typing3]

            typingElements.forEach((element, index) => {
                if (element) {
                    const text = element.textContent
                    element.textContent = ''

                    gsap.to({}, {
                        duration: text.length * 0.05,
                        delay: index * 2,
                        onUpdate: function () {
                            const progress = this.progress()
                            const currentLength = Math.floor(progress * text.length)
                            element.textContent = text.substring(0, currentLength)
                        }
                    })
                }
            })
        }
    }
}
</script>

<style lang="scss" scoped>
// .qa-floaties-container {
//     position: relative;
//     width: 100%;
//     height: 100vh;
//     overflow: hidden;
//     pointer-events: none;
// }

.qa-bubble {
    position: absolute;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    max-width: 320px;
    pointer-events: auto;
    z-index: 1;

    @media (max-width: 768px) {
        max-width: 280px;
    }

    @media (max-width: 576px) {
        max-width: 240px;
        gap: 0.5rem;
    }

    &.bubble-1 {
        top: 15%;
        right: -1%;

        @media (max-width: 992px) {
            top: 10%;
            right: 3%;
        }

        @media (max-width: 768px) {
            top: 8%;
            right: 2%;
            z-index: -1;
        }

        @media (max-width: 576px) {
            left: 1rem;
            right: 1rem;
        }
    }

    &.bubble-2 {
        top: 45%;
        right: 20%;

        @media (max-width: 992px) {
            top: 40%;
            right: 5%;
        }

        @media (max-width: 768px) {
            top: 35%;
            right: 3%;
            z-index: -10;
        }

        @media (max-width: 576px) {
            left: 1rem;
            right: 1rem;
        }
    }

    &.bubble-3 {
        bottom: -1%;
        right: 20%;

        @media (max-width: 992px) {
            bottom: 15%;
            left: 10%;
        }

        @media (max-width: 768px) {
            bottom: 12%;
            left: 5%;
        }

        @media (max-width: 576px) {
            left: auto;
            right: 0%;
            bottom: 1%;
        }
    }
}

.question-bubble,
.answer-bubble {
    border-radius: 0.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    animation: fadeInUp 0.6s ease-out forwards;
}

.user-bubble {
    background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
    align-self: flex-end;
    margin-left: 2rem;

    @media (max-width: 576px) {
        margin-left: 1rem;
    }
}

.bot-bubble {
    background: rgba(255, 255, 255, 0.95);
    color: #1f2937;
    align-self: flex-start;
    margin-right: 2rem;
    margin-top: 0.5rem;

    @media (max-width: 576px) {
        margin-right: 1rem;
    }
}

.bubble-content {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 1rem 1.25rem;

    @media (max-width: 576px) {
        padding: 0.8rem 1rem;
        gap: 0.5rem;
    }
}

.avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    @media (max-width: 576px) {
        width: 28px;
        height: 28px;
    }
}

.user-avatar {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

.bot-avatar {
    background: #10b981;
    color: white;
}

.bubble-text {
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.5;
    flex: 1;

    @media (max-width: 576px) {
        font-size: 0.5rem;
    }
}

.user-bubble .bubble-text {
    color: white;
    font-weight: 500;
}

.bot-bubble .bubble-text {
    color: #374151;
}

.cursor {
    color: #10b981;
    font-weight: bold;
    margin-left: 2px;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.9);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

// Hover effects
.qa-bubble:hover {

    .question-bubble,
    .answer-bubble {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }
}


@media (max-width: 576px) {

    .user-bubble {
        margin-left: 0.5rem;
    }

    .bot-bubble {
        margin-right: 0.5rem;
    }
}
</style>
