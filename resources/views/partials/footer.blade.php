<!-- Footer -->
<footer>
    <div class="footer-top">
        <div class="f-info">
            <div class="f-logo"><img src="{{ asset('assets/images/logo.webp') }}" alt="Logo"></div>
            <p>A One Hospicare is a premium manufacturer of medical furniture and hospital equipment. We are
                committed to excellence in healthcare infrastructure.</p>
            <div style="margin-top: 25px;">
                <p><i data-lucide="map-pin" size="16"></i> Udhyog Nagar, Nayta Mundla, Indore, MP 452001</p>
                <p><i data-lucide="phone" size="16"></i> +91 98260 64152</p>
                <p><i data-lucide="mail" size="16"></i> aonehospicare01@gmail.com</p>
            </div>
            <div style="margin-top: 20px; display: flex; gap: 15px;">
                <a href="https://www.instagram.com/aonehospicare?igsh=MWhkbWY0aTFxNWZmeA==" target="_blank" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: all 0.3s ease; text-decoration: none;" onmouseover="this.style.background='var(--secondary)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </a>
                <a href="https://youtube.com/@aonehospicare?si=AcqXPsdD200JqFBI" target="_blank" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: all 0.3s ease; text-decoration: none;" onmouseover="this.style.background='#ff0000'; this.style.transform='translateY(-3px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.42a2.78 2.78 0 0 0-1.94 2C1 8.14 1 12 1 12s0 3.86.46 5.58a2.78 2.78 0 0 0 1.94 2c1.72.42 8.6.42 8.6.42s6.88 0 8.6-.42a2.78 2.78 0 0 0 1.94-2C23 15.86 23 12 23 12s0-3.86-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
                </a>
            </div>
        </div>
        <div class="f-links">
            <h4>Products</h4>
            <ul>
                <li><a href="/products">ICU Patient Beds</a></li>
                <li><a href="/products">Ward Furniture</a></li>
                <li><a href="/products">Examination Tables</a></li>
                <li><a href="/products">Hospital Trolleys</a></li>
            </ul>
        </div>
        <div class="f-links">
            <h4>Our Presence</h4>
            <ul>
                <li><a href="{{ route('promotion.detail', 'icu-patient-beds-manufacturer-in-mumbai') }}">ICU Beds Mumbai</a></li>
                <li><a href="{{ route('promotion.detail', 'ward-furniture-manufacturer-in-ahmedabad') }}">Ward Furniture Ahmedabad</a></li>
                <li><a href="{{ route('promotion.detail', 'icu-patient-beds-manufacturer-in-pune') }}">ICU Beds Pune</a></li>
                <li><a href="{{ route('promotion.detail', 'examination-tables-manufacturer-in-nagpur') }}">Exam Tables Nagpur</a></li>
                <li><a href="/marketplace">All Locations</a></li>
            </ul>
        </div>
        <div class="f-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/about">About A One</a></li>
                <li><a href="/certificates">Certifications</a></li>
                <li><a href="/services">Our Services</a></li>
                <li><a href="/marketplace">Marketplace</a></li>
                <li><a href="/contact">Contact Support</a></li>
            </ul>
        </div>
        <div class="f-links">
            <h4>Legal</h4>
            <ul>
                <li><a href="/terms">Terms & Conditions</a></li>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/refund">Refund Policy</a></li>
                <li><a href="/return-bed">Return Guidelines</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
            <p>&copy; 2026 A One Hospicare. All rights reserved. Desinged, Pormoted and Developed By 24DigitalIndia</p>
            <div style="display: flex; gap: 25px;">
                <a href="/terms" style="color: #64748b; text-decoration: none; font-size: 13px;">Terms</a>
                <a href="/privacy" style="color: #64748b; text-decoration: none; font-size: 13px;">Privacy</a>
                <a href="/refund" style="color: #64748b; text-decoration: none; font-size: 13px;">Refund</a>
            </div>
        </div>
    </div>
</footer>