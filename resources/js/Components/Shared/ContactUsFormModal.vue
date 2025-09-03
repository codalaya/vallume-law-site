<template>
    <teleport to="body">
        <div class="modal-backdrop fade show" v-if="show"></div>

        <div class="modal fade" :class="{ show: show }" :style="{ 'display': show ? 'block' : 'none' }"
            data-bs-backdrop="static" tabindex="-1" :id="id" :aria-labelledby="id" aria-hidden="true">
            <div class="modal-dialog" :class="maxWidthClass">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">{{ metadata.reason ?? 'Contact Us' }}</h5>
                        <button @click="close()" type="button" :id="id + 'close'" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="contact-form" @submit.prevent="onSubmit" id="contactUsForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name" class="form-label">
                                        Full Name <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" v-model="form.name" required
                                        placeholder="Enter your full name" />
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">
                                        Phone Number <span class="required">*</span>
                                    </label>
                                    <!-- <input type="tel" class="form-control" id="phone" v-model="form.phone" required
                                        placeholder="Enter your phone number" /> -->
                                    <vue-tel-input v-model="form.phone" required @on-input="onPhoneInput"
                                        class="form-control py-2" :preferred-countries="['us', 'in', 'gb']"
                                        placeholder="Enter your phone number"></vue-tel-input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">
                                    Email Address <span class="required">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" v-model="form.email" required
                                    placeholder="Enter your email address" />
                            </div>

                            <div class="form-group">
                                <label for="message" class="form-label">
                                    Message <span class="required">*</span>
                                </label>
                                <textarea class="form-control" id="message" v-model="form.message" rows="5" required
                                    placeholder="Tell us how we can help you..."></textarea>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="close" class="btn btn-secondary" data-bs-dismiss="modal">{{
                            __('cancel') }}</button>
                        <button type="submit" form="contactUsForm" class="btn btn-primary" :disabled="isSubmitting"
                            id="crop"> <span v-if="isSubmitting" class="spinner-border spinner-border-sm me-2"
                                role="status"></span> {{ isSubmitting ? 'Sending...' : 'Send Message' }}</button>
                    </div>
                </div>

            </div>
        </div>
    </teleport>
</template>
<script>
import { useForm } from '@inertiajs/inertia-vue3'
import { defineComponent } from 'vue'


export default defineComponent({
    components: {

    },
    emits: ['close'],
    data() {
        return {
            croppedImageSrc: null,
            key: 1,
            isSubmitting: false,
            form: useForm({
                name: null,
                phone: null,
                email: null,
                message: null,
                metadata: { ...this.metadata },
                countrycode: '',
            }),
        }
    },
    props: {
        id: {
            type: String,
            required: true
        },
        aspectRatio: {
            default: 1 / 1
        },
        maxWidth: {
            default: 'lg'
        },
        backdrop: {
            default: null
        },
        show: {},
        heading: {
            type: String
        },
        minContainerWidth: {
            default: "500px"
        },
        minContainerHeight: {
            default: "250px"
        },
        metadata: { type: Object, default: () => ({}) }
    },
    methods: {
        close() {

            document.getElementById(this.id + 'close').click();
            this.$emit('close', true);
        },
        onSubmit() {
            this.isSubmitting = true;
            this.form.post(route('contact.store'), {
                onSuccess: () => {
                    this.form.reset()
                    this.close()
                },
                onError: () => {
                    console.error('Form Submission Error: ', error);
                },
                onFinish: () => {
                    this.isSubmitting = false;
                }
            })
        },
        onPhoneInput(value, obj) {
            this.form.countrycode = obj.countryCallingCode ?? ''
            this.form.phone = obj?.nationalNumber || value
        }
    },
    computed: {
        maxWidthClass() {
            return {
                'sm': 'modal-sm',
                'md': null,
                'lg': 'modal-lg',
                'xl': 'modal-xl',
            }[this.maxWidth]
        }
    },
    watch: {

    }
})
</script>

<style scoped lang="scss">
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-bg: #f8f9fa;
$border-color: #e9ecef;
$text-color: #495057;
$text-muted: #6c757d;

.contact-form-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 2rem 1rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.contact-form-container {
    background: white;
    border-radius: 0px;
    box-shadow: 0 20px 60px rgba(21, 63, 131, 0.08);
    padding: 3rem;
    max-width: 600px;
    width: 100%;
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, $primary-color 0%, $secondary-color 100%);
    }
}

.form-header {
    text-align: center;
    margin-bottom: 2.5rem;

    .form-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.25rem;
        font-weight: 600;
        color: $primary-color;
        margin-bottom: 0.75rem;
        position: relative;

        &::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: $secondary-color;
            border-radius: 0px;
        }
    }

    .form-subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        color: $text-muted;
        line-height: 1.6;
        margin-top: 1.5rem;
    }
}

.contact-form {
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        // margin-bottom: 1.5rem;

        @media (max-width: 768px) {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    .form-group {
        margin-bottom: 1.5rem;

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            color: $primary-color;
            margin-bottom: 0.5rem;
            display: block;

            .required {
                color: #dc3545;
                margin-left: 2px;
            }
        }

        .form-control {
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            border: 2px solid $border-color;
            border-radius: 0px;
            padding: 0.875rem 1.125rem;
            transition: all 0.3s ease;
            background: #fafbfc;
            width: 100%;
            box-sizing: border-box;

            &:focus {
                border-color: $primary-color;
                box-shadow: 0 0 0 3px rgba(21, 63, 131, 0.1);
                background: white;
                outline: none;
            }

            &::placeholder {
                color: $text-muted;
                font-size: 0.9rem;
            }

            &:hover:not(:focus) {
                border-color: lighten($primary-color, 30%);
            }
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }
    }
}

.form-actions {
    text-align: center;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid $border-color;

    .btn {
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-weight: 500;
        padding: 0.875rem 2.5rem;
        border-radius: 0px;
        border: none;
        transition: all 0.3s ease;
        text-transform: none;
        letter-spacing: 0.5px;
        cursor: pointer;

        &.btn-primary {
            background: linear-gradient(135deg, $primary-color 0%, lighten($primary-color, 10%) 100%);
            color: white;

            &:hover:not(:disabled) {
                background: linear-gradient(135deg, darken($primary-color, 5%) 0%, $primary-color 100%);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(21, 63, 131, 0.3);
            }

            &:active:not(:disabled) {
                transform: translateY(0);
            }

            &:disabled {
                background: $text-muted;
                cursor: not-allowed;
                transform: none;
                box-shadow: none;
            }
        }
    }

    .spinner-border {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        vertical-align: text-bottom;
        border: 0.15em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        animation: spinner-border 0.75s linear infinite;

        &.spinner-border-sm {
            width: 0.875rem;
            height: 0.875rem;
            border-width: 0.125em;
        }
    }

    .me-2 {
        margin-right: 0.5rem;
    }
}

@keyframes spinner-border {
    to {
        transform: rotate(360deg);
    }
}

// Mobile responsiveness
@media (max-width: 768px) {
    .contact-form-wrapper {
        padding: 1rem;
    }

    .contact-form-container {
        padding: 2rem 1.5rem;
    }

    .form-header .form-title {
        font-size: 1.875rem;
    }

    .form-actions .btn {
        width: 100%;
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .contact-form-container {
        padding: 1.5rem 1rem;
        border-radius: 0px;
    }

    .form-header .form-title {
        font-size: 1.625rem;
    }
}
</style>
