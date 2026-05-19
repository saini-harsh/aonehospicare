@extends('layouts.app')

@section('title', 'Patient Bed Buy-Back & Return Program | A One Hospicare')
@section('meta_description', 'Return your used A One Hospicare patient beds and get up to 40% return value. Sustainable healthcare solutions and easy bed upgrades in Indore.')
@section('meta_keywords', 'hospital bed buy back, return patient bed, used medical beds value, hospital furniture sustainability, A One Hospicare buy back program')

@push('styles')
    <style>
        .return-banner {
            background: radial-gradient(circle at top right, #004D40, #001F1C);
            padding: 80px 5% 60px;
            color: white;
            text-align: left;
            position: relative;
            overflow: hidden;
        }

        .return-banner::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0, 191, 165, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 100px 5% 50px;
        }

        .process-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            position: relative;
            border: 1px solid #f1f5f9;
            transition: var(--transition);
        }

        .process-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .process-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: var(--secondary);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.2rem;
            border: 4px solid white;
        }

        .warning-box {
            margin: 50px 5%;
            background: #FFFBEB;
            border: 2px dashed #D97706;
            border-radius: 15px;
            padding: 30px;
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .form-section {
            padding: 80px 5% 100px;
            background: #e3f2fd; /* Light blue background like Google Forms */
        }

        .return-form-container {
            max-width: 770px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            padding: 24px;
            border-radius: 8px;
            margin-bottom: 12px;
            border: 1px solid #dadce0;
            position: relative;
        }

        .form-card.header {
            border-top: 10px solid var(--primary);
            padding: 22px 24px;
        }

        .form-card.header h2 {
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            letter-spacing: .1px;
            line-height: 24px;
            color: #202124;
            font-weight: 400;
            margin-bottom: 15px;
        }

        .form-group input[type="text"], 
        .form-group input[type="email"], 
        .form-group input[type="tel"], 
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: none;
            border-bottom: 1px solid #dadce0;
            padding: 8px 0;
            font-size: 14px;
            outline: none;
            transition: border-bottom .2s ease-in-out;
        }

        .form-group input:focus {
            border-bottom: 2px solid var(--primary);
        }

        /* Radio styling */
        .radio-option {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            cursor: pointer;
        }

        .radio-option input {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 992px) {
            .process-grid {
                grid-template-columns: 1fr;
            }

            .return-banner h1 {
                font-size: 2.5rem !important;
            }

            .return-form-container {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .return-form-container form div {
                grid-template-columns: 1fr !important;
                gap: 20px !important;
            }

            .return-form-container {
                padding: 30px 20px;
            }

            .warning-box {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="return-banner">
        <div style="max-width: 1200px; margin: 0 auto;">
            <p style="font-size: 14px; opacity: 0.8; margin-bottom: 20px;">Home > Return Your Patient Bed</p>
            <h1 style="font-size: 4rem; margin-bottom: 15px; line-height: 1.1;">Hospital Bed <span
                    style="color: var(--secondary);">Buy-Back Program</span></h1>
            <p style="max-width: 600px; opacity: 0.9; font-size: 1.1rem;">Get up to 40% return value on your used A One
                Hospicare beds. Help us promote sustainability in healthcare while saving on your next upgrade.</p>
        </div>
    </section>

    <!-- Intro Text -->
    <section style="padding: 100px 5% 0; text-align: center; max-width: 800px; margin: 0 auto;">
        <h2 style="color: var(--primary); margin-bottom: 20px; font-size: 2.2rem;">Return Your Patient Bed</h2>
        <p style="color: var(--text-muted); line-height: 1.8;">If your loved one has either fully recovered or no longer
            requires the hospital bed, and you'd like to return it, please fill out our form. Just make sure the bed is in
            good condition, with the <strong>A One Hospicare sticker</strong> intact. <a href="#form"
                style="color: var(--secondary); font-weight: 600; text-decoration: underline;">Click here to start the
                process.</a></p>
    </section>

    <!-- Process Section -->
    <section class="process-grid">
        <div class="process-card">
            <div class="process-number">1</div>
            <div
                style="background: #f1f5f9; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                <i data-lucide="camera" size="32" style="color: var(--primary);"></i>
            </div>
            <h4 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px;">Photo Documentation</h4>
            <p style="font-size: 14px; color: var(--text-muted);">Take clear photos of the bed from all four sides. Ensure
                the overall condition and any wear-and-tear are visible.</p>
        </div>

        <div class="process-card">
            <div class="process-number">2</div>
            <div
                style="background: #f1f5f9; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                <i data-lucide="credit-card" size="32" style="color: var(--primary);"></i>
            </div>
            <h4 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px;">ID Verification</h4>
            <p style="font-size: 14px; color: var(--text-muted);">Keep your valid Government ID and the original purchase
                invoice (if available) ready for the submission.</p>
        </div>

        <div class="process-card">
            <div class="process-number">3</div>
            <div
                style="background: #f1f5f9; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                <i data-lucide="send" size="32" style="color: var(--primary);"></i>
            </div>
            <h4 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px;">Submit & Review</h4>
            <p style="font-size: 14px; color: var(--text-muted);">Fill out the form below. Our team will review your
                submission and contact you with a guaranteed buy-back offer.</p>
        </div>
    </section>

    <!-- Warning Info -->
    <div class="warning-box">
        <div style="background: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
            <i data-lucide="book-marked" size="24" style="color: #ef4444;"></i>
        </div>
        <div>
            <h5 style="color: #92400e; font-size: 1.2rem; margin-bottom: 5px;">A One Hospicare Sticker Required</h5>
            <p style="color: #b45309; font-size: 14px;">To qualify for the Return Value program, the bed <strong>must
                    clearly display the original A One Hospicare manufacturing sticker</strong>. Beds without a visible
                sticker or those from other manufacturers will not be accepted.</p>
        </div>
    </div>

    <!-- Form Section -->
    <section class="form-section" id="form">
        <div style="text-align: center; margin-bottom: 50px;">
            <p style="color: var(--secondary); font-weight: 700; letter-spacing: 2px; font-size: 14px;">SUBMISSION FORM</p>
            <h2 style="font-size: 2.5rem; color: var(--primary);">Evaluation Details</h2>
            <p style="color: var(--text-muted);">Please provide accurate details to help us evaluate your bed quickly.</p>
        </div>

        <div class="return-form-container">
            <form action="{{ route('inquiry.send') }}" method="POST" id="returnBedForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_type" value="return_bed">
                
                <div id="returnFormResponse" style="margin-bottom: 25px; display: none;"></div>

                <div class="form-card header">
                    <h2 style="color: var(--primary);">Patient Bed Buy-Back Program</h2>
                    <p style="font-size: 14px;">Please provide accurate details to help us evaluate your bed quickly. Mandatory fields are marked with *</p>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Customer name <span style="color:red;">*</span></label>
                        <input type="text" name="name" placeholder="Your answer" required>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Contact Number <span style="color:red;">*</span></label>
                        <input type="tel" name="phone" placeholder="Your answer" required>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Your answer">
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Address <span style="color:red;">*</span></label>
                        <textarea name="address" placeholder="Your answer" required rows="2"></textarea>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Bed Type <span style="color:red;">*</span></label>
                        <select name="bed_type" required>
                            <option value="">Choose</option>
                            <option value="ICU Bed">ICU Bed</option>
                            <option value="Fowler Bed">Fowler Bed</option>
                            <option value="Semi Fowler">Semi Fowler</option>
                        </select>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Purchase Date <span style="color:red;">*</span></label>
                        <input type="date" name="purchase_date" required style="border-bottom: 1px solid #dadce0;">
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Upload Images ( front view, side view, a one hospicare sticker close up) <span style="color:red;">*</span></label>
                        <p style="font-size: 12px; color: #64748b; margin-bottom: 15px;">Upload up to 5 supported files. Max 10 MB per file.</p>
                        <input type="file" name="bed_images[]" multiple required>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>ID Proof <span style="color:red;">*</span></label>
                        <p style="font-size: 12px; color: #64748b; margin-bottom: 20px;">Upload 1 supported file. Max 10 MB.</p>
                        <input type="file" name="id_proof" required>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label style="font-weight: 700; display: block; margin-bottom: 20px;">Condition & submission <span style="color:red;">*</span></label>
                        <label class="radio-option">
                            <input type="radio" name="condition" value="New" required> New
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="condition" value="Good"> Good
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="condition" value="average"> average
                        </label>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group">
                        <label>Query</label>
                        <textarea name="message" placeholder="Your answer" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-card">
                    <div class="form-group" style="padding: 10px 0;">
                        <label style="font-weight: 700; display: block; margin-bottom: 20px; color: #ef4444;">Agreement Required <span style="color:red;">*</span></label>
                        <p style="font-size: 14px; margin-bottom: 20px;">I confirm this is an A One Hospicare product with original sticker intact</p>
                        <label class="radio-option">
                            <input type="checkbox" name="agreement" value="yes" required> yes
                        </label>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
                    <button type="submit" id="returnSubmitBtn" class="btn btn-primary" style="padding: 10px 24px; border-radius: 4px; font-weight: 500; text-transform: none; font-size: 14px; box-shadow: none;">Submit</button>
                    <p style="color: var(--secondary); font-size: 12px; cursor: pointer;" onclick="document.getElementById('returnBedForm').reset()">Clear form</p>
                </div>
            </form>
        </div>

        <p style="text-align: center; margin-top: 40px; font-size: 14px; color: var(--text-muted);">
            Having trouble with the form? <a href="https://wa.me/919826064152"
                style="color: var(--secondary); font-weight: 700;">Contact Support</a>
        </p>
    </section>

@push('scripts')
<script>
    const returnForm = document.getElementById('returnBedForm');
    const returnResponseDiv = document.getElementById('returnFormResponse');
    const returnSubmitBtn = document.getElementById('returnSubmitBtn');

    if(returnForm) {
        returnForm.addEventListener('submit', function(e) {
            e.preventDefault();
            returnSubmitBtn.disabled = true;
            returnSubmitBtn.innerHTML = 'Submitting...';
            
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
                    returnResponseDiv.style.display = 'block';
                    returnResponseDiv.innerHTML = `<div style="background: #f0fdf4; color: #166534; padding: 15px; border-radius: 12px; border: 1px solid #dcfce7; font-weight: 600;"><i data-lucide="check-circle" size="18" style="vertical-align: middle; margin-right: 8px;"></i> ${data.message}</div>`;
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                    returnForm.reset();
                    returnSubmitBtn.innerHTML = 'Submit';
                    returnSubmitBtn.disabled = false;
                    
                    // Scroll to message
                    returnResponseDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                returnSubmitBtn.disabled = false;
                returnSubmitBtn.innerHTML = 'Submit';
            });
        });
    }
</script>
@endpush
@endsection