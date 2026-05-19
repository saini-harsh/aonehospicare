@extends('layouts.app')

@section('title', 'Contact Us | Hospital Furniture Manufacturer in Indore')
@section('meta_description', 'Contact A One Hospicare for high-quality medical equipment, hospital beds, and institutional furniture. Visit our factory in Indore or get a quote online.')
@section('meta_keywords', 'contact A One Hospicare, medical equipment manufacturer contact, hospital furniture suppliers Indore, buy hospital beds Indore, medical furniture phone number')

@push('styles')
<style>
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 60px;
        padding: 100px 5%;
        background: var(--white);
    }

    .contact-info-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .info-card {
        background: #f8fafc;
        padding: 30px;
        border-radius: 20px;
        display: flex;
        gap: 20px;
        transition: var(--transition);
        border: 1px solid transparent;
    }

    .info-card:hover {
        background: white;
        border-color: var(--secondary);
        box-shadow: var(--shadow-md);
        transform: translateY(-5px);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: var(--primary);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .info-content h4 {
        color: var(--primary);
        margin-bottom: 5px;
        font-size: 1.1rem;
    }

    .info-content p {
        color: var(--text-muted);
        font-size: 14px;
        line-height: 1.6;
    }

    .contact-form-container {
        background: white;
        padding: 50px;
        border-radius: 30px;
        box-shadow: var(--shadow-lg);
        border: 1px solid #f1f5f9;
    }

    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; gap: 40px; padding: 60px 5%; }
        .contact-banner h1 { font-size: 2.5rem !important; }
    }

    @media (max-width: 480px) {
        .contact-form-container { padding: 30px 20px; }
        .info-card { flex-direction: column; text-align: center; align-items: center; }
    }
</style>
@endpush

@section('content')
    <!-- Contact Banner -->
    <section class="contact-banner hero" style="min-height: 350px; background: linear-gradient(rgba(0, 77, 64, 0.9), rgba(0, 40, 35, 0.95)), url('{{ asset('assets/images/hero_bg_v2.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-content" style="text-align: center; margin: 0 auto;">
            <span class="tag" style="color: var(--secondary); font-weight: 700; letter-spacing: 2px;">GET IN TOUCH</span>
            <h1 style="font-size: 3.5rem; margin-top: 20px;">Contact A One Hospicare <span>Indore Factory</span></h1>
            <p style="margin: 20px auto; opacity: 0.9; max-width: 700px;">Connect with our technical team for expert guidance on hospital equipment and turnkey medical projects.</p>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="contact-grid">
        <!-- Left Side: Info -->
        <div class="contact-info-side">
            <div class="section-header" style="text-align: left; margin-bottom: 40px;">
                <p>CONTACT DETAILS</p>
                <h2>Reach Out to Our Experts</h2>
            </div>

            <div class="contact-info-cards">
                <!-- Phone & WhatsApp -->
                <a href="https://api.whatsapp.com/send/?phone=919826064152&text=Hi+A+One+Hospicare%21+I+have+an+enquiry." target="_blank" style="text-decoration: none;">
                    <div class="info-card">
                        <div class="info-icon" style="background: #25D366;"><i data-lucide="message-circle"></i></div>
                        <div class="info-content">
                            <h4>Phone / WhatsApp</h4>
                            <p style="font-weight: 700; color: var(--primary); font-size: 1.1rem; margin-bottom: 5px;">+91 98260 64152</p>
                            <p>Mon–Sat: 9 AM – 7 PM IST</p>
                        </div>
                    </div>
                </a>

                <!-- Email -->
                <div class="info-card">
                    <div class="info-icon"><i data-lucide="mail"></i></div>
                    <div class="info-content">
                        <h4>Email Us</h4>
                        <p style="font-weight: 700; color: var(--primary); font-size: 1.1rem; margin-bottom: 5px;">aonehospicare01@gmail.com</p>
                        <p>We reply within 2 business hours</p>
                    </div>
                </div>

                <!-- Plant Address -->
                <div class="info-card">
                    <div class="info-icon"><i data-lucide="map-pin"></i></div>
                    <div class="info-content">
                        <h4>Manufacturing Plant & Office</h4>
                        <p>Udhyog Nagar, Nayta Mundla, Indore, Madhya Pradesh – 452001</p>
                        <p style="margin-top: 10px; font-style: italic; font-size: 12px;">Factory visits by appointment (call ahead)</p>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="info-card">
                    <div class="info-icon" style="background: var(--secondary);"><i data-lucide="clock"></i></div>
                    <div class="info-content">
                        <h4>Business Hours</h4>
                        <p>Monday – Saturday: 9:00 AM – 7:00 PM</p>
                        <p>Sunday: <span style="color: #ef4444; font-weight: 600;">Closed</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Form -->
                <form action="{{ route('inquiry.send') }}" method="POST" id="contactPageInquiryForm" class="inquiry-form-card" style="padding: 0; box-shadow: none;">
                    @csrf
                    <h3 style="color: var(--primary); margin-bottom: 30px; font-size: 1.8rem;">Send a Message</h3>
                    
                    <div id="contactFormResponse" style="margin-bottom: 25px; display: none;"></div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="name@example.com" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" placeholder="+91 00000 00000" required>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject" required>
                                <option value="">Select Service</option>
                                <option value="Product Inquiry">Product Inquiry</option>
                                <option value="Fabrication Service">Fabrication Service</option>
                                <option value="Refurbished Equipment">Refurbished Equipment</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 30px;">
                        <label>Your Message</label>
                        <textarea name="message" rows="5" placeholder="How can we help you?" required></textarea>
                    </div>

                    <button type="submit" id="contactSubmitBtn" class="btn btn-primary" style="width: 100%; padding: 18px; font-size: 1.1rem;">Send Inquiry Now</button>
                    
                    <p style="text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-muted);">
                        <i data-lucide="shield-check" size="14" style="vertical-align: middle; color: var(--secondary);"></i> 
                        Your data is safe and encrypted.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- Google Map (Iframe) -->
    <section class="map-section" style="height: 450px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.392610793087!2d75.90364319999999!3d22.676424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962e39b9c746387%3A0xdcb0cfe3c9e8d841!2sA%20One%20Hospicare!5e0!3m2!1sen!2sin!4v1776933594685!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection

@push('scripts')
<script>
    const contactForm = document.getElementById('contactPageInquiryForm');
    const contactResponseDiv = document.getElementById('contactFormResponse');
    const contactSubmitBtn = document.getElementById('contactSubmitBtn');

    if(contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            contactSubmitBtn.disabled = true;
            contactSubmitBtn.innerHTML = 'Sending...';
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    contactResponseDiv.style.display = 'block';
                    contactResponseDiv.innerHTML = `<div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 12px; border: 1px solid #dcfce7; font-weight: 600;"><i data-lucide="check-circle" size="18" style="vertical-align: middle; margin-right: 8px;"></i> \${data.message}</div>`;
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                    contactForm.reset();
                    contactSubmitBtn.innerHTML = 'Send Inquiry Now';
                    contactSubmitBtn.disabled = false;
                    
                    // Scroll to message
                    contactResponseDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                contactSubmitBtn.disabled = false;
                contactSubmitBtn.innerHTML = 'Send Inquiry Now';
            });
        });
    }
</script>
@endpush
