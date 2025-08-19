<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Testimonial Slider</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .testimonial-container {
            margin: auto;
            background: white;
            border-radius: 20px;
            padding: 60px 40px;
            max-width: 900px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .testimonial-header {
            margin-bottom: 40px;
        }

        .testimonial-label {
            color: #888;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .testimonial-title {
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .testimonial-content {
            margin-bottom: 40px;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .testimonial-text {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            position: absolute;
            width: 100%;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .testimonial-text.active {
            opacity: 1;
            transform: translateY(0);
            position: relative;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 40px;
        }

        .star {
            color: #ffc107;
            font-size: 24px;
        }

        .slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 20px 0;
        }

        .avatar-slider {
            display: flex;
            transition: transform 0.3s ease;
            gap: 20px;
            cursor: grab;
            user-select: none;
        }
        
        .avatar {
            margin: 0 10px;
        }

        /* Corrected CSS to display clones, but with reduced opacity */
        .avatar.clone {
            opacity: 0.7;
        }

        .avatar-slider:active {
            cursor: grabbing;
        }

        .avatar {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            position: relative;
        }

        .avatar.active {
            transform: scale(1.2);
            border-color: #004F11;
            opacity: 1;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-name {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            font-weight: 600;
            color: #333;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .avatar.active .avatar-name {
            opacity: 1;
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #004F11;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .nav-arrow:hover {
            background: #004F11;
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .nav-arrow.left {
            left: 20px;
        }

        .nav-arrow.right {
            right: 20px;
        }

        @media (max-width: 768px) {
            .testimonial-container {
                padding: 40px 20px;
            }
            
            .testimonial-title {
                font-size: 24px;
            }
            
            .testimonial-text {
                font-size: 16px;
            }
            
            .avatar {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="testimonial-container">
        <button class="nav-arrow left">‹</button>
        <button class="nav-arrow right">›</button>
        
        <div class="testimonial-header">
            <div class="testimonial-label">TESTIMONIAL</div>
            <h2 class="testimonial-title">Hear From Our Happy Travelers</h2>
        </div>

        <div class="testimonial-content">
            <div class="testimonial-text active" id="activeTestimonial">
                I had the most incredible vacation experience thanks to the amazing team at XYZ Travel Agency! From the moment I contacted them, their friendly and knowledgeable staff helped me plan the perfect itinerary. They took care of every detail, from booking flights and accommodations to arranging local tours and activities.
            </div>
        </div>

        <div class="stars">
            <span class="star">★</span>
            <span class="star">★</span>
            <span class="star">★</span>
            <span class="star">★</span>
            <span class="star">★</span>
        </div>

        <div class="slider-container">
            <div class="avatar-slider" id="avatarSlider">
                <div class="avatar clone" data-index="4">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face" alt="Klaus">
                    <div class="avatar-name">Klaus</div>
                </div>
                <div class="avatar clone" data-index="5">
                    <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=150&h=150&fit=crop&crop=face" alt="Bryan">
                    <div class="avatar-name">Bryan</div>
                </div>
                <div class="avatar clone" data-index="6">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="avatar-name">Emma</div>
                </div>
                
                <div class="avatar" data-index="0">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47c?w=150&h=150&fit=crop&crop=face" alt="Helen">
                    <div class="avatar-name">Helen</div>
                </div>
                <div class="avatar" data-index="1">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Peter">
                    <div class="avatar-name">Peter</div>
                </div>
                <div class="avatar" data-index="2">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Victor">
                    <div class="avatar-name">Victor</div>
                </div>
                <div class="avatar" data-index="3">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" alt="Nora Achola">
                    <div class="avatar-name">Nora Achola</div>
                </div>
                <div class="avatar" data-index="4">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face" alt="Klaus">
                    <div class="avatar-name">Klaus</div>
                </div>
                <div class="avatar" data-index="5">
                    <img src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=150&h=150&fit=crop&crop=face" alt="Bryan">
                    <div class="avatar-name">Bryan</div>
                </div>
                <div class="avatar" data-index="6">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="avatar-name">Emma</div>
                </div>
                <div class="avatar" data-index="7">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face" alt="Emma">
                    <div class="avatar-name">Emma</div>
                </div>
                
                <div class="avatar clone" data-index="0">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b47c?w=150&h=150&fit=crop&crop=face" alt="Helen">
                    <div class="avatar-name">Helen</div>
                </div>
                <div class="avatar clone" data-index="1">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Peter">
                    <div class="avatar-name">Peter</div>
                </div>
                <div class="avatar clone" data-index="2">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Victor">
                    <div class="avatar-name">Victor</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        class TestimonialSlider {
            constructor() {
                this.slider = document.getElementById('avatarSlider');
                this.allAvatars = document.querySelectorAll('.avatar');
                this.originalAvatars = document.querySelectorAll('.avatar:not(.clone)');
                this.testimonialElement = document.getElementById('activeTestimonial');
                this.leftArrow = document.querySelector('.nav-arrow.left');
                this.rightArrow = document.querySelector('.nav-arrow.right');
                
                this.testimonials = [
                    "I had the most incredible vacation experience thanks to the amazing team at XYZ Travel Agency! From the moment I contacted them, their friendly and knowledgeable staff helped me plan the perfect itinerary. They took care of every detail, from booking flights and accommodations to arranging local tours and activities.",
                    "Outstanding service from start to finish! The team went above and beyond to ensure our honeymoon was perfect. Every recommendation was spot-on, and the attention to detail was remarkable. We couldn't have asked for a better travel experience.",
                    "Professional, reliable, and incredibly helpful. Victor made our family vacation stress-free and memorable. The customized itinerary was exactly what we needed, and the 24/7 support during our trip gave us peace of mind.",
                    "Nora's expertise in European travel is unmatched! She crafted the perfect 10-day tour that exceeded all our expectations. Her local knowledge and connections made all the difference in creating an authentic travel experience.",
                    "Klaus provided exceptional service for our business trip. Everything was organized perfectly, from flights to accommodations to meeting venues. His attention to detail and professionalism made our corporate travel seamless.",
                    "Bryan helped us plan the adventure of a lifetime! His recommendations for off-the-beaten-path destinations were incredible. The entire trip was well-coordinated, and we felt supported throughout our journey.",
                    "Emma's creativity in designing our cultural tour was amazing! She understood exactly what we were looking for and delivered an experience that was both educational and enjoyable. Highly recommend her services!",
                    "Emma's creativity in designing our cultural tour was amazing! She understood exactly what we were looking for and delivered an experience that was both educational and enjoyable. Highly recommend her services!"
                ];
                
                this.currentIndex = 0;
                this.totalOriginalAvatars = this.originalAvatars.length;
                // Start with the first original avatar, which is at index 2 in the full list
                this.activeAvatarIndex = 3; 
                this.isDragging = false;
                this.startX = 0;
                this.currentX = 0;
                this.initialTransform = 0;
                
                this.init();
            }

            init() {
                this.setInitialPosition();
                this.addEventListeners();
            }

            setInitialPosition() {
                this.allAvatars[this.activeAvatarIndex].classList.add('active');
                this.updateTestimonial();
                this.centerActiveAvatar();
            }

            addEventListeners() {
                this.allAvatars.forEach((avatar, index) => {
                    avatar.addEventListener('click', () => {
                        const dataIndex = parseInt(avatar.getAttribute('data-index'));
                        this.setActiveByDataIndex(dataIndex);
                    });
                });

                this.leftArrow.addEventListener('click', () => {
                    this.prev();
                });

                this.rightArrow.addEventListener('click', () => {
                    this.next();
                });

                this.slider.addEventListener('mousedown', this.handleStart.bind(this));
                this.slider.addEventListener('touchstart', this.handleStart.bind(this));
                
                document.addEventListener('mousemove', this.handleMove.bind(this));
                document.addEventListener('touchmove', this.handleMove.bind(this));
                
                document.addEventListener('mouseup', this.handleEnd.bind(this));
                document.addEventListener('touchend', this.handleEnd.bind(this));

                this.slider.addEventListener('contextmenu', (e) => e.preventDefault());
            }

            handleStart(e) {
                this.isDragging = true;
                this.startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
                this.slider.style.transition = 'none';
                
                const style = window.getComputedStyle(this.slider);
                const matrix = new DOMMatrix(style.transform);
                this.initialTransform = matrix.m41;
            }

            handleMove(e) {
                if (!this.isDragging) return;
                
                e.preventDefault();
                this.currentX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
                const deltaX = this.currentX - this.startX;
                
                this.slider.style.transform = `translateX(${this.initialTransform + deltaX}px)`;
            }

            handleEnd() {
                if (!this.isDragging) return;
                
                this.isDragging = false;
                this.slider.style.transition = 'transform 0.3s ease';
                
                const deltaX = this.currentX - this.startX;
                const threshold = 50;
                
                if (Math.abs(deltaX) > threshold) {
                    if (deltaX > 0) {
                        this.prev();
                    } else {
                        this.next();
                    }
                } else {
                    this.centerActiveAvatar();
                }
            }

            setActiveByDataIndex(dataIndex) {
                this.currentIndex = dataIndex;
                this.updateActiveAvatar();
                this.updateTestimonial();
                this.centerActiveAvatar();
            }

            updateActiveAvatar() {
                this.allAvatars.forEach(avatar => avatar.classList.remove('active'));
                
                // Find all avatars with the current data-index and activate them
                this.allAvatars.forEach((avatar, index) => {
                    if (parseInt(avatar.getAttribute('data-index')) === this.currentIndex) {
                        avatar.classList.add('active');
                        // Set the activeAvatarIndex to the first non-cloned avatar with this data-index
                        if (!avatar.classList.contains('clone')) {
                             this.activeAvatarIndex = index;
                        }
                    }
                });
            }

            updateTestimonial() {
                this.testimonialElement.style.opacity = '0';
                this.testimonialElement.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    this.testimonialElement.textContent = this.testimonials[this.currentIndex];
                    this.testimonialElement.style.opacity = '1';
                    this.testimonialElement.style.transform = 'translateY(0)';
                }, 250);
            }

            centerActiveAvatar() {
                const containerWidth = this.slider.parentElement.offsetWidth;
                const activeAvatar = this.allAvatars[this.activeAvatarIndex];
                
                const avatarCenter = activeAvatar.offsetLeft + activeAvatar.offsetWidth / 2;
                const containerCenter = containerWidth / 2;
                const transform = containerCenter - avatarCenter;
                
                this.slider.style.transform = `translateX(${transform}px)`;
            }

            next() {
                this.currentIndex = (this.currentIndex + 1) % this.totalOriginalAvatars;
                this.activeAvatarIndex++;
                
                // Check if we've moved to the end clones and need to "jump" back
                if (this.activeAvatarIndex >= this.allAvatars.length - 2) {
                    this.slider.style.transition = 'none';
                    this.activeAvatarIndex = 2; // Jump back to first original
                    this.centerActiveAvatar();
                    setTimeout(() => { this.slider.style.transition = 'transform 0.3s ease'; }, 50);
                }
                
                this.updateActiveAvatar();
                this.updateTestimonial();
                if (this.slider.style.transition !== 'none') {
                    this.centerActiveAvatar();
                }
            }

            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.totalOriginalAvatars) % this.totalOriginalAvatars;
                this.activeAvatarIndex--;
                
                // Check if we've moved to the beginning clones and need to "jump" back
                if (this.activeAvatarIndex < 2) {
                    this.slider.style.transition = 'none';
                    this.activeAvatarIndex = this.allAvatars.length - 3; // Jump to last original
                    this.centerActiveAvatar();
                    setTimeout(() => { this.slider.style.transition = 'transform 0.3s ease'; }, 50);
                }
                
                this.updateActiveAvatar();
                this.updateTestimonial();
                if (this.slider.style.transition !== 'none') {
                    this.centerActiveAvatar();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new TestimonialSlider();
        });

        window.addEventListener('resize', () => {
            const slider = new TestimonialSlider(); // Re-initialize or get instance
            slider.centerActiveAvatar();
        });
    </script>
</body>
</html>