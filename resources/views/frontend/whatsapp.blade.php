<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shreenathjitourism</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            min-height: 100vh;
            background: #f5f5f5;
        }

        /* WhatsApp Floating Button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            cursor: pointer;
            z-index: 9999;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: none;
            outline: none;
            top: 83%;
        }

        .whatsapp-float:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 30px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-float:active {
            transform: scale(0.95);
        }

        .whatsapp-float.active {
            background: #128C7E;
        }

        .whatsapp-float svg {
            width: 32px;
            height: 32px;
            fill: white;
            transition: transform 0.3s ease;
        }

        .whatsapp-float.active svg {
            transform: rotate(90deg);
        }

        /* WhatsApp Chat Popup */
        .whatsapp-popup {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 360px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            z-index: 9998;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px) scale(0.9);
            pointer-events: none;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .whatsapp-popup.active {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: all;
        }

        /* Popup Header */
        .whatsapp-popup-header {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            padding: 24px 20px;
            color: white;
            position: relative;
        }

        .whatsapp-popup-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="30" cy="25" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="60" cy="15" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1.2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .whatsapp-popup-header h3 {
            margin: 0 0 8px 0;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .whatsapp-popup-header h3 svg {
            width: 28px;
            height: 28px;
            fill: white;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .whatsapp-popup-header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        .whatsapp-close {
            position: absolute;
            top: 18px;
            right: 18px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .whatsapp-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        /* Popup Body */
        .whatsapp-popup-body {
            padding: 20px;
            background: #f0f2f5;
            max-height: 300px;
            overflow-y: auto;
        }

        .whatsapp-popup-body::-webkit-scrollbar {
            width: 6px;
        }

        .whatsapp-popup-body::-webkit-scrollbar-track {
            background: #f0f2f5;
        }

        .whatsapp-popup-body::-webkit-scrollbar-thumb {
            background: #25D366;
            border-radius: 3px;
        }

        .whatsapp-notice {
            background: white;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            font-size: 13px;
            color: #667781;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .whatsapp-notice::before {
            content: '⚡';
            font-size: 16px;
        }

        /* Team Member */
        .whatsapp-team-member {
            background: white;
            padding: 16px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            text-decoration: none;
            color: inherit;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
        }

        .whatsapp-team-member::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 211, 102, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .whatsapp-team-member:hover::before {
            left: 100%;
        }

        .whatsapp-team-member:hover {
            transform: translateX(5px) scale(1.02);
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.2);
        }

        .whatsapp-team-member:active {
            transform: translateX(5px) scale(0.98);
        }

        .whatsapp-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
            position: relative;
        }

        .whatsapp-avatar::after {
            content: '';
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background: #00d856;
            border-radius: 50%;
            border: 2px solid white;
        }

        .whatsapp-avatar svg {
            width: 28px;
            height: 28px;
            fill: white;
        }

        .whatsapp-member-info {
            flex: 1;
        }

        .whatsapp-member-info h4 {
            margin: 0 0 4px 0;
            font-size: 16px;
            font-weight: 600;
            color: #111b21;
        }

        .whatsapp-member-info p {
            margin: 0;
            font-size: 13px;
            color: #667781;
        }

        .whatsapp-chat-icon {
            width: 26px;
            height: 26px;
            fill: #25D366;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .whatsapp-team-member:hover .whatsapp-chat-icon {
            transform: scale(1.2) rotate(15deg);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .whatsapp-popup {
                width: calc(100vw - 40px);
                right: 20px;
            }

            .whatsapp-float {
                bottom: 15px;
                right: 15px;
                width: 56px;
                height: 56px;
            }

            .whatsapp-float svg {
                width: 28px;
                height: 28px;
            }

            .whatsapp-popup {
                bottom: 80px;
            }
        }

        /* Pulse animation for float button */
        @keyframes pulse {
            0% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }

            50% {
                box-shadow: 0 4px 30px rgba(37, 211, 102, 0.6);
            }

            100% {
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            }
        }

        .whatsapp-float {
            animation: pulse 2s infinite;
        }

        /* Demo content styling */
        .demo-content {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .demo-content h1 {
            color: #111b21;
            margin-bottom: 20px;
        }

        .demo-content p {
            color: #667781;
            line-height: 1.6;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- WhatsApp Floating Button -->
    <button class="whatsapp-float" id="whatsappFloat" aria-label="Open WhatsApp Chat">
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16 0C7.164 0 0 7.164 0 16c0 2.824.736 5.488 2.028 7.82L0 32l8.36-2.008A15.906 15.906 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.28c-2.384 0-4.712-.64-6.76-1.848l-.484-.288-5.02 1.208 1.236-4.92-.316-.5A13.186 13.186 0 012.72 16C2.72 8.66 8.66 2.72 16 2.72S29.28 8.66 29.28 16 23.34 29.28 16 29.28zm7.268-9.896c-.396-.2-2.352-1.16-2.716-1.292-.364-.132-.628-.2-.892.2-.264.396-1.024 1.292-1.256 1.556-.232.264-.464.3-.86.1-.396-.2-1.676-.616-3.192-1.968-1.18-1.052-1.976-2.352-2.208-2.748-.232-.396-.024-.612.172-.808.18-.176.396-.464.596-.696.2-.232.264-.396.396-.66.132-.264.068-.496-.032-.696-.1-.2-.892-2.148-1.224-2.94-.324-.772-.652-.668-.892-.68-.232-.012-.496-.016-.76-.016s-.696.1-1.06.496c-.364.396-1.392 1.36-1.392 3.316s1.424 3.848 1.62 4.112c.2.264 2.792 4.264 6.768 5.976.944.408 1.684.652 2.26.836.948.3 1.812.256 2.496.156.76-.112 2.352-.96 2.684-1.888.332-.928.332-1.724.232-1.888-.1-.164-.364-.264-.76-.464z" />
        </svg>
    </button>

    <!-- WhatsApp Chat Popup -->
    <div class="whatsapp-popup" id="whatsappPopup">
        <div class="whatsapp-popup-header">
            <h3>
                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 0C7.164 0 0 7.164 0 16c0 2.824.736 5.488 2.028 7.82L0 32l8.36-2.008A15.906 15.906 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm0 29.28c-2.384 0-4.712-.64-6.76-1.848l-.484-.288-5.02 1.208 1.236-4.92-.316-.5A13.186 13.186 0 012.72 16C2.72 8.66 8.66 2.72 16 2.72S29.28 8.66 29.28 16 23.34 29.28 16 29.28z" />
                </svg>
                Start a Conversation
            </h3>
            <p>Hi! Click below to chat on WhatsApp</p>
            <button class="whatsapp-close" id="whatsappClose" aria-label="Close">×</button>
        </div>
        <div class="whatsapp-popup-body">
            <div class="whatsapp-notice">
                The team typically replies in a few minutes
            </div>
            <a href="https://api.whatsapp.com/message/LVTJGK4PEPNVO1?autoload=1&app_absent=0" target="_blank" class="whatsapp-team-member" rel="noopener noreferrer">
                <div class="whatsapp-avatar">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 0C7.164 0 0 7.164 0 16c0 2.824.736 5.488 2.028 7.82L0 32l8.36-2.008A15.906 15.906 0 0016 32c8.836 0 16-7.164 16-16S24.836 0 16 0zm7.268 20.384c-.396-.2-2.352-1.16-2.716-1.292-.364-.132-.628-.2-.892.2-.264.396-1.024 1.292-1.256 1.556-.232.264-.464.3-.86.1-.396-.2-1.676-.616-3.192-1.968-1.18-1.052-1.976-2.352-2.208-2.748-.232-.396-.024-.612.172-.808.18-.176.396-.464.596-.696.2-.232.264-.396.396-.66.132-.264.068-.496-.032-.696-.1-.2-.892-2.148-1.224-2.94-.324-.772-.652-.668-.892-.68-.232-.012-.496-.016-.76-.016s-.696.1-1.06.496c-.364.396-1.392 1.36-1.392 3.316s1.424 3.848 1.62 4.112c.2.264 2.792 4.264 6.768 5.976.944.408 1.684.652 2.26.836.948.3 1.812.256 2.496.156.76-.112 2.352-.96 2.684-1.888.332-.928.332-1.724.232-1.888-.1-.164-.364-.264-.76-.464z" />
                    </svg>
                </div>
                <div class="whatsapp-member-info">
                    <h4>Support Team</h4>
                    <p>Customer Support</p>
                </div>
                <svg class="whatsapp-chat-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12c0 1.54.36 3 .97 4.29L2 22l5.71-.97C9 21.64 10.46 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm0 18c-1.41 0-2.73-.35-3.89-.97l-.28-.17-2.91.49.49-2.91-.17-.28C4.35 14.73 4 13.41 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8zm4.5-5.5c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.44.12-.14.17-.25.25-.41.08-.17.04-.31-.02-.44-.06-.12-.56-1.34-.76-1.84-.2-.48-.4-.42-.56-.42h-.47c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74.59.25 1.05.4 1.41.51.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.17-.48-.29z" />
                </svg>
            </a>
        </div>
    </div>

    <script>
        (function() {
            'use strict';

            // Get elements
            const whatsappFloat = document.getElementById('whatsappFloat');
            const whatsappPopup = document.getElementById('whatsappPopup');
            const whatsappClose = document.getElementById('whatsappClose');

            if (!whatsappFloat || !whatsappPopup || !whatsappClose) {
                console.error('WhatsApp elements not found');
                return;
            }

            // Toggle popup on float button click
            whatsappFloat.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const isActive = whatsappPopup.classList.contains('active');

                if (isActive) {
                    closePopup();
                } else {
                    openPopup();
                }
            });

            // Close popup on close button click
            whatsappClose.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closePopup();
            });

            // Close popup when clicking outside
            document.addEventListener('click', function(e) {
                if (!whatsappPopup.contains(e.target) && !whatsappFloat.contains(e.target)) {
                    closePopup();
                }
            });

            // Prevent popup from closing when clicking inside it
            whatsappPopup.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Functions to open/close popup
            function openPopup() {
                whatsappPopup.classList.add('active');
                whatsappFloat.classList.add('active');

                // Add slight delay to the animation
                setTimeout(() => {
                    whatsappPopup.style.pointerEvents = 'all';
                }, 100);
            }

            function closePopup() {
                whatsappPopup.classList.remove('active');
                whatsappFloat.classList.remove('active');
                whatsappPopup.style.pointerEvents = 'none';
            }

            // Close popup on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && whatsappPopup.classList.contains('active')) {
                    closePopup();
                }
            });

            // Prevent body scroll when popup is open on mobile
            let lastScrollPosition = 0;

            whatsappFloat.addEventListener('click', function() {
                if (window.innerWidth <= 480) {
                    if (whatsappPopup.classList.contains('active')) {
                        lastScrollPosition = window.pageYOffset;
                        document.body.style.overflow = 'hidden';
                        document.body.style.position = 'fixed';
                        document.body.style.top = `-${lastScrollPosition}px`;
                        document.body.style.width = '100%';
                    } else {
                        document.body.style.overflow = '';
                        document.body.style.position = '';
                        document.body.style.top = '';
                        document.body.style.width = '';
                        window.scrollTo(0, lastScrollPosition);
                    }
                }
            });

            console.log('WhatsApp widget initialized successfully');
        })();
    </script>

</body>

</html>
