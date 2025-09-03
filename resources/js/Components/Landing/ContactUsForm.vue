<template>
    <div class="contact-wrapper">
        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="section-title font-header">{{ settings.form_page_title }}</h2>
        </div>

        <form @submit.prevent="submitForm" class="contact-form" novalidate>
            <div class="row g-3">
                <!-- Name Fields -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="lastName" class="form-label">Name *</label>
                        <input type="text" id="lastName" v-model="formData.name" class="form-control"
                            :class="{ 'is-invalid': errors.name }" @blur="validateField('name')"
                            @input="clearError('name')" />
                        <div v-if="errors.name" class="invalid-feedback">
                            {{ errors.name }}
                        </div>
                    </div>
                </div>

                <!-- Email and Phone -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" id="email" v-model="formData.email" class="form-control"
                            :class="{ 'is-invalid': errors.email }" @blur="validateField('email')"
                            @input="clearError('email')" />
                        <div v-if="errors.email" class="invalid-feedback">
                            {{ errors.email }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <!-- <input type="tel" id="phone" v-model="formData.phone" class="form-control"
                            :class="{ 'is-invalid': errors.phone }" @blur="validateField('phone')"
                            @input="clearError('phone')" placeholder="Include country code" /> -->
                        <vue-tel-input v-model="formData.phone" required @on-input="onPhoneInput" class="form-control"
                            :class="{ 'is-invalid': errors.phone }" :preferred-countries="['us', 'in', 'gb']"
                            placeholder="Enter your phone number"></vue-tel-input>
                        <div v-if="errors.phone" class="invalid-feedback">
                            {{ errors.phone }}
                        </div>
                    </div>
                </div>

                <!-- Location and Legal Area -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location" class="form-label">Location *</label>
                        <select id="location" v-model="formData.location" class="form-select"
                            :class="{ 'is-invalid': errors.location }" @change="validateField('location')">
                            <option value="">Select your location</option>
                            <option value="usa">United States</option>
                            <option value="india">India</option>
                            <option value="other">Other</option>
                        </select>
                        <div v-if="errors.location" class="invalid-feedback">
                            {{ errors.location }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="legalArea" class="form-label">Area of Legal Interest *</label>
                        <select id="legalArea" v-model="formData.legal_area" class="form-select"
                            :class="{ 'is-invalid': errors.legal_area }" @change="validateField('legal_area')">
                            <option value="">Select legal area</option>
                            <option v-for="item in settings.legal_interest_list" :value="item">{{ item }}</option>
                        </select>
                        <div v-if="errors.legalArea" class="invalid-feedback">
                            {{ errors.legalArea }}
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="message" class="form-label">Message *</label>
                        <textarea id="message" v-model="formData.message" class="form-control"
                            :class="{ 'is-invalid': errors.message }" rows="5" @blur="validateField('message')"
                            @input="clearError('message')"
                            placeholder="Please describe your legal matter and how we can assist you..."></textarea>
                        <div v-if="errors.message" class="invalid-feedback">
                            {{ errors.message }}
                        </div>
                    </div>
                </div>

                <!-- Consent Checkbox -->
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" id="consent" v-model="formData.consent" class="form-check-input"
                            :class="{ 'is-invalid': errors.consent }" @change="validateField('consent')" />
                        <label for="consent" class="form-check-label">
                            {{ settings.consent_message }} *
                        </label>
                        <div v-if="errors.consent" class="invalid-feedback">
                            {{ errors.consent }}
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-submit" :disabled="isSubmitting">
                        <span v-if="isSubmitting" class="spinner-border spinner-border-sm me-2" role="status"></span>
                        {{ isSubmitting ? 'Sending...' : 'Send Message' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import { createToaster } from "@meforma/vue-toaster";
const page = usePage();
const settings = page.props.value.dashboard_data.contactWithUsSection;
const assetUrl = window.assetUrl;
const toaster = createToaster();
const formData = useForm({
    name: '',
    email: '',
    phone: '',
    countrycode: '',
    location: '',
    legal_area: '',
    message: '',
    consent: true
})

const errors = ref({})
const isSubmitting = ref(false)
const showSuccess = ref(false)

const validateField = (fieldName) => {
    delete errors.value[fieldName]

    switch (fieldName) {
        case 'first_name':
        case 'last_name':
            if (!formData[fieldName].trim()) {
                errors.value[fieldName] = 'This field is required'
            } else if (formData[fieldName].trim().length < 2) {
                errors.value[fieldName] = 'Must be at least 2 characters'
            }
            break

        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
            if (!formData.email.trim()) {
                errors.value.email = 'Email is required'
            } else if (!emailRegex.test(formData.email)) {
                errors.value.email = 'Please enter a valid email address'
            }
            break

        case 'phone':
            const phoneRegex = /^[\+]?[\d\s\-\(\)]{10,}$/
            if (!formData.phone.trim()) {
                errors.value.phone = 'Phone number is required'
            } else if (!phoneRegex.test(formData.phone.replace(/\s/g, ''))) {
                errors.value.phone = 'Please enter a valid phone number'
            }
            break

        case 'location':
            if (!formData.location) {
                errors.value.location = 'Please select your location'
            }
            break

        case 'legal_area':
            if (!formData.legal_area) {
                errors.value.legal_area = 'Please select an area of legal interest'
            }
            break

        case 'message':
            if (!formData.message.trim()) {
                errors.value.message = 'Message is required'
            } else if (formData.message.trim().length < 10) {
                errors.value.message = 'Message must be at least 10 characters'
            }
            break

        case 'consent':
            if (!formData.consent) {
                errors.value.consent = 'You must consent to being contacted'
            }
            break
    }
}

const clearError = (fieldName) => {
    if (errors.value[fieldName]) {
        delete errors.value[fieldName]
    }
}

function onPhoneInput(value, obj) {
    formData.countrycode = obj.countryCallingCode ?? ''
    formData.phone = obj?.nationalNumber || value
}


const validateForm = () => {
    Object.keys(formData).forEach(field => {
        validateField(field)
    })
    return Object.keys(errors.value).length === 0
}

const submitForm = async () => {
    if (!validateForm()) {
        return
    }

    isSubmitting.value = true

    formData.post(route('contact.store'), {
        onSuccess(response) {
            toaster.success('Contact Details saved.');
            // Reset form
            Object.keys(formData).forEach(key => {
                if (typeof formData[key] === 'boolean') {
                    formData[key] = false
                } else {
                    formData[key] = ''
                }
            })
            showSuccess.value = true

            // Hide success message after 5 seconds
            setTimeout(() => {
                showSuccess.value = false
            }, 5000)
        },
        onError(err) {
            errors.value = err

            console.error('Form submission error:', err)
        },
        onFinish() {
            isSubmitting.value = false
        }
    })

}
</script>

<style lang="scss" scoped>
// Variables
$primary-color: #153f83;
$secondary-color: #D4AF37;
$light-gray: #f8f9fa;
$border-color: #e9ecef;
$text-color: #333;
$text-muted: #666;

.contact-section {
    //   padding: 80px 0;
    //   background-color: #fcfcfc;
    font-family: 'Poppins', sans-serif;

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        color: $primary-color;
        margin-bottom: 1rem;
        font-weight: 400;
        letter-spacing: -0.5px;

        @media (max-width: 768px) {
            font-size: 1.8rem;
        }
    }

    .section-subtitle {
        font-size: 1rem;
        color: $text-muted;
        max-width: 600px;
        margin: 0 auto;
        font-weight: 300;
    }
}

.contact-wrapper {

    border-radius: 2px;

    @media (max-width: 768px) {
        padding: 30px;
    }
}

.contact-info {
    .info-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: $primary-color;
        margin-bottom: 1rem;
    }

    .info-description {
        color: $text-muted;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;

        .contact-icon {
            width: 45px;
            height: 45px;
            background: $primary-color;
            border-radius: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            border: 1px solid rgba(21, 63, 131, 0.1);

            i {
                color: white;
                font-size: 1.1rem;
            }
        }

        .contact-details {
            h6 {
                color: $primary-color;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            p {
                color: $text-muted;
                margin-bottom: 0;
                line-height: 1.5;
            }
        }
    }
}

.contact-form {
    .form-label {
        color: $text-color;
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control,
    .form-select {
        border: 1px solid $border-color;
        border-radius: 2px;
        padding: 14px 16px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background-color: #fafafa;

        &:focus {
            border-color: $primary-color;
            box-shadow: 0 0 0 1px rgba($primary-color, 0.1);
            background-color: white;
        }

        &.is-invalid {
            border-color: #dc3545;
            background-color: #fff5f5;
        }
    }

    .form-control {
        &::placeholder {
            color: #aaa;
        }
    }

    .form-check {
        .form-check-input {
            width: 1.1em;
            height: 1.1em;
            border: 1px solid $border-color;
            border-radius: 1px;
            background-color: #fafafa;

            &:checked {
                background-color: $primary-color;
                border-color: $primary-color;
            }

            &:focus {
                box-shadow: 0 0 0 1px rgba($primary-color, 0.1);
            }

            &.is-invalid {
                border-color: #dc3545;
            }
        }

        .form-check-label {
            color: $text-muted;
            font-size: 0.9rem;
            line-height: 1.4;
            margin-left: 0.5rem;
        }
    }

    .btn-submit {
        background: $primary-color;
        border: 1px solid darken($primary-color, 5%);
        border-radius: 2px;
        padding: 16px 32px;
        font-size: 0.95rem;
        font-weight: 500;
        color: white;
        transition: all 0.2s ease;
        letter-spacing: 0.5px;
        text-transform: uppercase;

        &:hover:not(:disabled) {
            background-color: darken($primary-color, 5%);
            border-color: darken($primary-color, 10%);
            box-shadow: 0 2px 8px rgba($primary-color, 0.25);
        }

        &:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
        margin-top: 0.25rem;
    }
}

.alert-success {
    border-radius: 2px;
    border: 1px solid #c3e6cb;
    background-color: #f8fff9;
    color: #155724;
    padding: 1rem 1.25rem;

    i {
        color: #28a745;
    }
}

// Form group spacing
.form-group {
    margin-bottom: 1.5rem;
}

// Responsive adjustments
@media (max-width: 992px) {
    .contact-info {
        margin-bottom: 3rem;
        text-align: center;

        .contact-item {
            justify-content: center;
        }
    }
}

@media (max-width: 576px) {
    .contact-section {
        padding: 40px 0;
    }

    .contact-wrapper {
        padding: 20px;
    }

    .btn-submit {
        width: 100%;
    }
}
</style>
