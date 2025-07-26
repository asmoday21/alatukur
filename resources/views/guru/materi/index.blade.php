@extends('guru.guru_master')
@section('guru')

    <style>
        /* CSS Variables for a professional, technical theme */
        :root {
            --primary-color: #004d7a; /* Deeper, richer blue */
            --secondary-color: #0077b6; /* More vibrant medium blue */
            --accent-color: #48cae4; /* Brighter, lighter sky blue/cyan */
            --success-color: #28a745; /* Green - for success, completed */
            --danger-color: #dc3545; /* Red - for errors, warnings */
            --warning-color: #ffc107; /* Amber - for locked, caution */
            --info-color: #0096c7; /* Solid, clear blue for information */

            --light-bg-start: #e0f2f7; /* Very light blueish gradient start */
            --light-bg-end: #ccf2ff; /* Slightly darker light blueish gradient end */
            --card-bg-light: #FFFFFF; /* Pure White Card background */
            --border-light: #b3e0ff; /* Lighter, more vibrant border blue */
            --text-dark-primary: #333; /* Deep dark grey for main text */
            --text-dark-secondary: #555; /* Medium grey for secondary text */
            --shadow-light: 0 8px 25px rgba(0, 0, 0, 0.15); /* Softer shadow */
            --header-glow: 0 0 40px rgba(0, 0, 0, 0.5); /* Deep shadow for header glow */
            --button-shadow: 0 0 25px rgba(72, 202, 228, 0.6), 0 8px 20px rgba(0,0,0,0.4); /* Neon-like button shadow, updated to new accent */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--light-bg-start) 0%, var(--light-bg-end) 100%);
            color: var(--text-dark-primary);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles for light theme */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 77, 122, 0.05) 0%, transparent 50%), /* Primary color based */
                radial-gradient(circle at 80% 20%, rgba(72, 202, 228, 0.05) 0%, transparent 50%), /* Accent color based */
                radial-gradient(circle at 40% 40%, rgba(40, 167, 69, 0.03) 0%, transparent 50%); /* Success color based */
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .container {
            position: relative;
            z-index: 1;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.05); /* Subtle shadow for the whole content area */
            background-color: #fff; /* Ensure content area has a background */
            border-radius: 1.5rem; /* Match header radius */
        }

        .main-title {
            font-family: 'Inter', sans-serif; /* Back to Inter for consistency with previous header */
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            font-weight: 800;
            font-size: 2.8rem;
            margin-bottom: 2.5rem;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3); /* Back to subtle header text shadow */
        }

        .search-container {
            background: var(--card-bg-light);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-light);
            margin-bottom: 3.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
            justify-content: space-between;
        }

        .search-form {
            flex-grow: 1;
            display: flex;
            gap: 0.75rem;
        }

        .search-input {
            background: #f1f3f5;
            border: 1px solid var(--border-light);
            color: var(--text-dark-primary);
            border-radius: 15px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            flex-grow: 1;
        }

        .search-input:focus {
            background: #ffffff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 77, 122, 0.25); /* Adjusted to primary-color */
            color: var(--text-dark-primary);
        }

        .search-input::placeholder {
            color: var(--text-dark-secondary);
        }

        .btn-search {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 15px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--button-shadow);
            white-space: nowrap;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 77, 122, 0.2); /* Adjusted to primary-color */
            color: white;
        }

        .btn-add-material {
            background: linear-gradient(135deg, var(--success-color), #388E3C);
            border: none;
            border-radius: 15px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--button-shadow);
            white-space: nowrap;
        }

        .btn-add-material:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2);
            color: white;
        }

        .material-card {
            background: var(--card-bg-light);
            border: 1px solid var(--border-light);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-light);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .material-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); /* Accent color */
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .material-card:hover::before {
            transform: scaleX(1);
        }

        .material-card:hover:not(.locked-overlay) {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 0 30px rgba(0, 77, 122, 0.15), /* Adjusted to primary color */
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            border-color: rgba(0, 77, 122, 0.3); /* Adjusted to primary color */
        }

        .material-card.locked-overlay:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 
                0 10px 20px rgba(0, 0, 0, 0.05),
                0 0 15px rgba(255, 193, 7, 0.05);
            border-color: rgba(255, 193, 7, 0.1);
        }

        .core-badge {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); /* Accent color */
            color: white;
            padding: 0.4rem 0.9rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: 0 4px 15px rgba(0, 77, 122, 0.1); /* Adjusted to primary color */
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .material-icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            display: block;
        }

        .icon-tcp { color: var(--primary-color); }
        .icon-network { color: var(--info-color); }
        .icon-security { color: var(--danger-color); }
        .icon-maintenance { color: var(--success-color); }

        .progress-indicator {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: bold;
            z-index: 10;
        }

        .progress-completed {
            background: linear-gradient(135deg, var(--success-color), #388E3C);
            color: white;
            box-shadow: 0 0 15px rgba(76, 175, 80, 0.2);
        }

        .progress-locked {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
            border: 2px solid var(--warning-color);
        }

        .progress-available {
            background: rgba(0, 77, 122, 0.1); /* Adjusted to primary color */
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 10px rgba(0, 77, 122, 0.2); } /* Adjusted to primary color */
            to { box-shadow: 0 0 20px rgba(0, 77, 122, 0.4); } /* Adjusted to primary color */
        }

        .score-display {
            position: absolute;
            top: 4rem;
            right: 1rem;
            background: rgba(40, 167, 69, 0.9); /* Success color */
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
            white-space: nowrap;
        }

        .locked-overlay {
            position: relative;
        }

        .locked-overlay::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(6px);
            border-radius: 20px;
            z-index: 2;
        }

        .lock-indicator {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            text-align: center;
            color: var(--warning-color);
            pointer-events: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .lock-icon {
            font-size: 3.5rem;
            margin-bottom: 0.75rem;
            animation: shake 0.5s ease-in-out infinite alternate;
            filter: drop-shadow(0 0 10px rgba(255, 193, 7, 0.5));
        }

        @keyframes shake {
            0% { transform: rotate(-3deg); }
            100% { transform: rotate(3deg); }
        }

        .lock-text {
            font-size: 1rem;
            font-weight: 700;
            text-shadow: 0 0 8px rgba(255, 193, 7, 0.3);
            margin-bottom: 0.25rem;
        }

        .unlock-requirements {
            font-size: 0.85rem;
            color: var(--text-dark-secondary);
            margin-top: 0.25rem;
            max-width: 250px;
            line-height: 1.3;
        }

        .material-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .material-card .card-text {
            flex-grow: 1;
            margin-bottom: 1.5rem !important;
        }

        .btn-material {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 15px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: var(--button-shadow);
        }

        .btn-material:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 77, 122, 0.2); /* Adjusted to primary color */
            color: white;
        }

        .btn-material:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            background: #E0E0E0;
            color: #999999;
            box-shadow: none;
        }

        .btn-material.btn-success {
            background: linear-gradient(135deg, var(--success-color), #388E3C);
            box-shadow: var(--button-shadow);
        }

        .btn-material.btn-success:hover:not(:disabled) {
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2);
        }

        .btn-material.btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #D32F2F);
            box-shadow: var(--button-shadow);
        }

        .btn-material.btn-danger:hover:not(:disabled) {
            box-shadow: 0 8px 25px rgba(244, 67, 54, 0.2);
        }

        /* Removed .section-divider styles as it's replaced by a button-like element */
        /* .section-divider {
            display: flex;
            align-items: center;
            margin: 4rem 0;
            opacity: 0.7;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--border-light), transparent);
        }

        .section-divider span {
            padding: 0.5rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark-secondary);
            background: var(--card-bg-light);
            border-radius: 25px;
            border: 1px solid var(--border-light);
            white-space: nowrap;
        } */

        .simulation-controls {
            background: var(--card-bg-light);
            border-radius: 20px;
            padding: 2rem;
            margin: 3.5rem 0;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-light);
        }

        .btn-simulate {
            margin: 0.35rem;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: var(--button-shadow);
        }

        .btn-simulate.btn-info {
            background: linear-gradient(135deg, var(--info-color), #0056b3); /* Darker info blue */
            border: none;
            color: white;
        }

        .btn-simulate.btn-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268); /* Medium grey tones */
            border: none;
            color: white;
        }

        .btn-simulate.btn-warning {
            background: linear-gradient(135deg, var(--warning-color), #e0a800); /* Darker warning orange */
            border: none;
            color: white;
        }

        .alert {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: var(--text-dark-primary);
            font-family: 'Inter', sans-serif;
        }
        .alert-success { background-color: #d4edda; border-color: #c3e6cb; color: #155724; } /* Lighter success */
        .alert-warning { background-color: #fff3cd; border-color: #ffeeba; color: #856404; } /* Lighter warning */
        .alert-info { background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460; } /* Lighter info */
        .alert-danger { background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; } /* Lighter danger */


        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            border-top: 2px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Header specific styles (from previous design) */
        header {
            background: linear-gradient(135deg, #004d7a 0%, #0077b6 50%, #48cae4 100%); /* New vibrant blue gradient */
            border-bottom: 5px solid var(--accent-color); /* Bright blue accent */
            min-height: 380px; /* Increased height for better visual impact */
            position: relative;
            overflow: hidden;
            border-radius: 1.5rem !important; /* Larger border-radius */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5); /* Deeper shadow */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            animation: header-fade-in 1.2s ease-out forwards; /* Fade in header on load */
        }
        
        /* Animated network elements - IMPROVED RIPPLE EFFECT */
        .network-connection {
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(72, 202, 228, 0.4); /* Solid border for ripple, updated to new accent */
            animation: ripple 3s cubic-bezier(0.25, 0.46, 0.45, 0.94) infinite, fade-in 1.5s ease-out forwards; /* Smoother ripple */
            opacity: 0; /* Start hidden for fade-in */
            transform: scale(0); /* Start small for ripple */
        }
        .network-connection:nth-child(1) { width: 280px; height: 280px; top: 10%; left: 5%; animation-duration: 4s; animation-delay: 0.5s; } /* Longer duration */
        .network-connection:nth-child(2) { width: 350px; height: 350px; bottom: 15%; right: 10%; animation-duration: 4.5s; animation-delay: 0.8s; }
        .network-connection:nth-child(3) { width: 220px; height: 220px; top: 20%; right: 25%; animation-duration: 3.8s; animation-delay: 1.1s; }
        .network-connection:nth-child(4) { width: 260px; height: 260px; bottom: 5%; left: 35%; animation-duration: 4.2s; animation-delay: 1.4s; }
        
        .node {
            width: 15px; /* Larger node */
            height: 15px;
            background: var(--accent-color); /* Bright blue, updated to new accent */
            border-radius: 50%;
            box-shadow: 0 0 25px var(--accent-color), 0 0 10px rgba(72, 202, 228, 0.8); /* More intense glow, updated to new accent */
            animation: node-ping 2.5s infinite ease-in-out, float-node 7s infinite ease-in-out, fade-in 1s ease-out forwards; /* NEW node-ping animation */
            z-index: 3; /* Ensure nodes are above connections */
            opacity: 0; /* Start hidden for fade-in */
            animation-fill-mode: forwards;
        }
        .node:nth-child(1) { top: 12%; left: 18%; animation-delay: 1s; }
        .node:nth-child(2) { top: 68%; left: 22%; animation-delay: 1.3s; }
        .node:nth-child(3) { top: 32%; right: 28%; animation-delay: 1.6s; }
        .node:nth-child(4) { top: 78%; right: 18%; animation-delay: 1.9s; }

        @keyframes header-fade-in {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes ripple {
            0% {
                transform: scale(0.5); /* Start slightly larger */
                opacity: 0.8; /* Start more visible */
                border-width: 4px; /* Thicker border initially */
            }
            50% {
                transform: scale(1.2);
                opacity: 0.4;
                border-width: 2px;
            }
            100% {
                transform: scale(1.8); /* Expand more */
                opacity: 0;
                border-width: 0px; /* Fade out border */
            }
        }
        @keyframes node-ping {
            0% {
                opacity: 0.7;
                transform: scale(1);
                box-shadow: 0 0 15px var(--accent-color);
            }
            30% {
                opacity: 1;
                transform: scale(1.3);
                box-shadow: 0 0 40px var(--accent-color), 0 0 20px rgba(72, 202, 228, 0.9);
            }
            70% {
                opacity: 0.7;
                transform: scale(1);
                box-shadow: 0 0 15px var(--accent-color);
            }
            100% {
                opacity: 0.7;
                transform: scale(1);
                box-shadow: 0 0 15px var(--accent-color);
            }
        }
        @keyframes float-node {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
        @keyframes titleWord {
            0% { transform: translateY(0); opacity: 0; }
            30% { opacity: 1; }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); opacity: 1; }
        }
        @keyframes text-fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slide-in-left {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slide-in-right {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }


        .lead {
            font-weight: 300;
            color: rgba(255, 255, 255, 0.95) !important;
            font-size: 1.3rem;
            animation: text-fade-in 1.2s ease-out 1.6s forwards;
            opacity: 0;
        }

        .badge {
            font-size: 0.95em;
            padding: 0.7em 1.2em;
            border-radius: 0.75rem;
            opacity: 0.9;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            font-weight: 500;
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
        }
        .badge:nth-child(1) { animation-delay: 2s; }
        .badge:nth-child(2) { animation-delay: 2.2s; }
        .badge:nth-child(3) { animation-delay: 2.4s; }

        .badge:hover {
            opacity: 1;
            transform: translateY(-5px) scale(1.08);
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }

        .btn-neon {
            background: linear-gradient(45deg, var(--accent-color), var(--info-color)); /* Updated to new accent/info */
            color: var(--primary-color); /* Dark text for contrast */
            border: none;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 0 25px rgba(72, 202, 228, 0.6), 0 8px 20px rgba(0,0,0,0.4); /* Updated to new accent */
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.8rem 2rem;
            animation: fade-in-up 1s ease-out 2.6s forwards;
            opacity: 0;
        }
        
        .btn-neon:hover {
            background: linear-gradient(45deg, #99e6ff, #007bb3); /* Keep some light blue for hover */
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 0 40px rgba(72, 202, 228, 0.9), 0 12px 30px rgba(0,0,0,0.6); /* Updated to new accent */
            color: var(--primary-color);
        }


        .card {
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: none;
            opacity: 0;
            transform: translateY(20px);
            animation: fade-in-up 1s ease-out forwards;
            margin-bottom: 2.5rem;
        }
        .card:hover {
            transform: translateY(-10px) scale(1.01);
            box-shadow: 0 18px 45px rgba(0,0,0,0.25);
        }

        section.card:nth-of-type(1) { animation-delay: 0.5s; }
        section.card:nth-of-type(2) { animation-delay: 0.7s; }
        section.card:nth-of-type(3) { animation-delay: 0.9s; }
        section.card:nth-of-type(4) { animation-delay: 1.1s; }
        section.card:nth-of-type(5) { animation-delay: 1.3s; }
        section.card:nth-of-type(6) { animation-delay: 1.5s; }
        section.card:nth-of-type(7) { animation-delay: 1.7s; }
        section.card:nth-of-type(8) { animation-delay: 1.9s; }


        .card-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); /* Consistent with new header */
            color: white;
        }
        .card-header h2 {
            opacity: 0;
            animation: slide-in-left 0.7s ease-out forwards;
            font-size: 1.75rem;
        }
        .card-header .badge {
            opacity: 0;
            animation: slide-in-right 0.7s ease-out forwards;
            font-size: 0.85em;
            padding: 0.6em 1em;
            background-color: white !important;
        }
        .card-header .badge.text-info { color: var(--info-color) !important; }
        .card-header .badge.text-success { color: var(--success-color) !important; }
        .card-header .badge.text-primary { color: var(--info-color) !important; } /* Use info for consistency */
        .card-header .badge.text-danger { color: var(--danger-color) !important; }
        .card-header .badge.text-warning { color: var(--warning-color) !important; }


        .card-body {
            padding: 2rem;
        }
        .section-sub-title {
            opacity: 0;
            animation: fade-in-up 0.6s ease-out forwards;
            margin-bottom: 1rem;
            font-size: 1.4rem;
            color: var(--primary-color); /* Match header color */
        }
        .card-body > p.text-dark:first-of-type {
            opacity: 0;
            animation: fade-in-up 0.7s ease-out forwards;
            line-height: 1.7;
        }
        .list-group-flush li {
            opacity: 0;
            animation: slide-in-left 0.5s ease-out forwards;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            line-height: 1.6;
            background-color: transparent !important;
            border-color: #f0f0f0 !important;
        }
        .list-group-flush li i {
            font-size: 1.1em;
            width: 25px;
            text-align: center;
        }


        .content-box {
            opacity: 0;
            animation: fade-in-up 0.8s ease-out forwards;
            padding: 1.75rem;
            border: 1px solid var(--border-light);
        }
        .alert {
            opacity: 0;
            animation: slide-in-right 0.8s ease-out forwards;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            border-radius: 0.75rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .alert i {
            margin-right: 15px;
            font-size: 1.8em;
        }
        .mermaid {
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
        }
        .video-container {
            opacity: 0;
            animation: fade-in-up 0.9s ease-out forwards;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            position: relative;
            height: 0;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .table-responsive {
            opacity: 0;
            animation: fade-in-up 1s ease-out forwards;
            margin-top: 1.5rem;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            padding: 1.2rem 1rem;
            font-size: 0.95rem;
            background-color: var(--accent-color); /* Bright blue for table header */
            color: white;
            border-bottom: 2px solid var(--primary-color);
        }
        .table tbody td {
            padding: 1rem;
            font-size: 0.9rem;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.02);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .display-3 {
                font-size: 2rem;
            }
            .lead {
                font-size: 1.1rem;
            }
            .card-header h2 {
                font-size: 1.4rem;
                text-align: center;
            }
            .card-header .badge {
                display: block;
                margin-top: 0.5rem;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }
            .card-header {
                flex-direction: column;
                gap: 0.75rem;
            }
            .card-body {
                padding: 1.2rem;
            }
            .col-lg-8.mx-auto {
                padding: 0 15px;
            }
            .main-title { /* Adjusted for main title responsiveness */
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }
            .title-word {
                margin-right: 6px;
            }
            .list-group-flush li {
                padding: 0.6rem 0.5rem;
                font-size: 0.9em;
            }
            .list-group-flush li i {
                font-size: 1em;
                width: 20px;
            }
            .quiz-card {
                padding: 1.5rem;
            }
            .quiz-option {
                padding: 0.8rem;
                font-size: 0.9em;
            }
            .table thead th, .table tbody td {
                padding: 0.8rem 0.6rem;
                font-size: 0.8em;
            }
            .alert {
                padding: 1rem;
                flex-direction: column;
                text-align: center;
            }
            .alert i {
                margin-right: 0;
                margin-bottom: 10px;
            }
            .container {
                border-radius: 0;
            }
        }
        @media (max-width: 480px) {
            .display-3 {
                font-size: 1.7rem;
            }
            .lead {
                font-size: 1rem;
            }
            .btn-neon {
                padding: 0.6rem 1.5rem;
                font-size: 0.9em;
            }
            .badge {
                font-size: 0.8em;
                padding: 0.5em 0.8em;
            }
            .card-header h2 {
                font-size: 1.2rem;
            }
            .section-sub-title {
                font-size: 1.2rem;
            }
            .card-body p {
                font-size: 0.9em;
            }
        }

    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="main-title">
            <i class="bi bi-cpu me-3"></i>
            Alat Ukur dan Pengukuran Jaringan Komputer
        </h1>

        <!-- Search Section -->
        <div class="search-container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 w-100">
                <form method="GET" class="d-flex flex-grow-1 w-100" role="search">
                    <input 
                        type="search" 
                        name="search" 
                        class="form-control search-input me-md-3" 
                        placeholder="🔍 Cari materi pembelajaran..." 
                        aria-label="Search materials"
                        value="{{ request('search') }}"
                    >
                <button class="btn btn-search" type="submit">
                    <i class="bi bi-search me-2"></i> Cari
                </button>
            </form>

            <a href="{{ route('guru.materi.create') }}" class="btn btn-add-material">
              <i class="bi bi-plus-circle me-2"></i> Tambah Materi
            </a>
        </div>

        <!-- Core Materials -->
        <div class="row g-4 mb-4">
            <!-- Material 1: Fungsi Alat Ukur -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="material-card" id="material-1" data-material="1">
                    <div class="progress-indicator progress-available">
                        <i class="bi bi-play-fill"></i>
                    </div>
                    <div class="score-display" id="score-1" style="display: none;">
                        Skor: <span class="score-value">0</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="core-badge mb-3">
                            <i class="bi bi-star-fill"></i>
                            <span>Materi Inti</span>
                        </div>
                        
                        <i class="bi bi-diagram-3 material-icon icon-tcp"></i>
                        
                        <h5 class="card-title fw-bold mb-3" style="color: var(--text-dark-primary);">
                            Fungsi Alat Ukur
                        </h5>

                        <p class="card-text text-muted mb-4" style="color: var(--text-dark-secondary) !important;">
                            Memahami peran krusial berbagai alat ukur dalam memastikan kinerja optimal jaringan komputer dan telekomunikasi, mulai dari deteksi gangguan hingga evaluasi sinyal.
                        </p>

                        <div class="d-grid mt-auto">
                          <a href="{{ route('guru.materi.fungsi_alatukur', ['id' => 1]) }}" class="btn btn-material">
                            <i class="bi bi-journal-text me-2"></i> Pelajari Materi
                          </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Material 2: Analisis Penggunaan Alat Ukur -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="material-card locked-overlay" id="material-2" data-material="2">
                    <div class="progress-indicator progress-locked">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <div class="score-display" id="score-2" style="display: none;">
                        Skor: <span class="score-value">0</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="core-badge mb-3">
                            <i class="bi bi-star-fill"></i>
                            <span>Materi Inti</span>
                        </div>
                        
                        <i class="bi bi-server material-icon icon-network"></i>
                        
                        <h5 class="card-title fw-bold mb-3" style="color: var(--text-dark-primary);">
                            Analisis Penggunaan Alat Ukur
                        </h5>

                        <p class="card-text text-muted mb-4" style="color: var(--text-dark-secondary) !important;">
                            Mempelajari cara menganalisis dan memilih alat ukur yang paling sesuai untuk mengatasi berbagai permasalahan umum dalam jaringan komputer dan telekomunikasi.

                        </p>

                        <div class="d-grid mt-auto">
                          <a href="{{ route('guru.materi.analisis_alatukur', ['id' => 2]) }}" class="btn btn-material" onclick="materialSystem.openMaterial(2)" disabled>
                            <i class="bi bi-journal-text me-2"></i> Pelajari Materi
                          </a>
                        </div>
                    </div>
                    <div class="lock-indicator">
                        <i class="bi bi-lock-fill lock-icon"></i>
                        <div class="lock-text">Terkunci</div>
                        <div class="unlock-requirements">Selesaikan kuis Materi 1 dengan skor minimal 80 untuk membuka materi ini</div>
                    </div>
                </div>
            </div>

            <!-- Material 3: Penggunaan Alat Ukur -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="material-card locked-overlay" id="material-3" data-material="3">
                    <div class="progress-indicator progress-locked">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <div class="score-display" id="score-3" style="display: none;">
                        Skor: <span class="score-value">0</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="core-badge mb-3">
                            <i class="bi bi-star-fill"></i>
                            <span>Materi Inti</span>
                        </div>
                        
                        <i class="bi bi-shield-lock material-icon icon-security"></i>
                        
                        <h5 class="card-title fw-bold mb-3" style="color: var(--text-dark-primary);">
                            Penggunaan Alat Ukur
                        </h5>

                        <p class="card-text text-muted mb-4" style="color: var(--text-dark-secondary) !important;">
                            Menguasai prosedur operasional standar untuk menggunakan berbagai alat ukur, memastikan pengukuran yang akurat dan aman dalam setiap skenario pekerjaan.
                        </p>

                        <div class="d-grid mt-auto">
                          <a href="{{ route('guru.materi.penggunaan_alatukur', ['id' => 3]) }}" class="btn btn-material" onclick="materialSystem.openMaterial(3)" disabled>
                            <i class="bi bi-journal-text me-2"></i> Pelajari Materi
                          </a>
                        </div>
                    </div>
                    <div class="lock-indicator">
                        <i class="bi bi-lock-fill lock-icon"></i>
                        <div class="lock-text">Terkunci</div>
                        <div class="unlock-requirements">Selesaikan kuis Materi 1 & 2 dengan skor minimal 80 untuk membuka materi ini</div>
                    </div>
                </div>
            </div>

            <!-- Material 4: Pemeliharaan Alat Ukur -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="material-card locked-overlay" id="material-4" data-material="4">
                    <div class="progress-indicator progress-locked">
                        <i class="bi bi-lock-fill"></i>
                    </div>
                    <div class="score-display" id="score-4" style="display: none;">
                        Skor: <span class="score-value">0</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="core-badge mb-3">
                            <i class="bi bi-star-fill"></i>
                            <span>Materi Inti</span>
                        </div>
                        
                        <i class="bi bi-tools material-icon icon-maintenance"></i>
                        
                        <h5 class="card-title fw-bold mb-3" style="color: var(--text-dark-primary);">
                            Pemeliharaan Alat Ukur
                        </h5>

                        <p class="card-text text-muted mb-4" style="color: var(--text-dark-secondary) !important;">
                            Memahami pentingnya perawatan berkala dan jenis-jenis pemeliharaan (preventif, korektif, kualitatif) untuk menjaga akurasi dan memperpanjang usia pakai alat ukur.
                        </p>

                        <div class="d-grid mt-auto">
                          <a href="{{ route('guru.materi.pemeliharaan_alatukur', ['id' => 4]) }}" class="btn btn-material" onclick="materialSystem.openMaterial(4)" disabled>
                            <i class="bi bi-journal-text me-2"></i> Pelajari Materi
                          </a>
                        </div>
                    </div>
                    <div class="lock-indicator">
                        <i class="bi bi-lock-fill lock-icon"></i>
                        <div class="lock-text">Terkunci</div>
                        <div class="unlock-requirements">Selesaikan kuis Materi 1, 2 & 3 dengan skor minimal 80 untuk membuka materi ini</div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Simulation Controls -->
        <div class="simulation-controls">
            <h6 class="mb-3" style="color: var(--text-dark-secondary);">
                <i class="bi bi-gear-fill me-2"></i>Kontrol Simulasi (Demo)
            </h6>
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <button class="btn btn-simulate btn-info" onclick="materialSystem.simulateQuizResult(1, 85)">
                    <i class="bi bi-check-circle-fill me-1"></i>Lulus Kuis 1 (Skor: 85)
                </button>
                <button class="btn btn-simulate btn-secondary" onclick="materialSystem.simulateQuizResult(1, 65)">
                    <i class="bi bi-x-circle-fill me-1"></i>Gagal Kuis 1 (Skor: 65)
                </button>
                <button class="btn btn-simulate btn-info" onclick="materialSystem.simulateQuizResult(2, 86)">
                    <i class="bi bi-check-circle-fill me-1"></i>Lulus Kuis 2 (Skor: 86)
                </button>
                <button class="btn btn-simulate btn-secondary" onclick="materialSystem.simulateQuizResult(2, 70)">
                    <i class="bi bi-x-circle-fill me-1"></i>Gagal Kuis 2 (Skor: 70)
                </button>
                <button class="btn btn-simulate btn-info" onclick="materialSystem.simulateQuizResult(3, 88)">
                    <i class="bi bi-check-circle-fill me-1"></i>Lulus Kuis 3 (Skor: 88)
                </button>
                <button class="btn btn-simulate btn-secondary" onclick="materialSystem.simulateQuizResult(3, 75)">
                    <i class="bi bi-x-circle-fill me-1"></i>Gagal Kuis 3 (Skor: 75)
                </button>
                <button class="btn btn-simulate btn-info" onclick="materialSystem.simulateQuizResult(4, 92)">
                    <i class="bi bi-check-circle-fill me-1"></i>Lulus Kuis 4 (Skor: 92)
                </button>
                <button class="btn btn-simulate btn-secondary" onclick="materialSystem.simulateQuizResult(4, 60)">
                    <i class="bi bi-x-circle-fill me-1"></i>Gagal Kuis 4 (Skor: 60)
                </button>
                <button class="btn btn-simulate btn-warning" onclick="materialSystem.resetAllProgress()">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset Semua
                </button>
            </div>
            <p class="text-muted small mt-3 mb-0" style="color: var(--text-dark-secondary) !important;">
                <i class="bi bi-info-circle-fill me-1"></i>
                Kontrol ini hanya untuk demonstrasi. Skor minimal 80 diperlukan untuk membuka materi berikutnya.
            </p>
        </div>

        {{-- Moved "Materi Tambahan" button to be below Simulation Controls and centered --}}
        <div class="d-flex justify-content-center my-4"> {{-- Changed to d-flex justify-content-center --}}
            <button class="btn btn-outline-primary rounded-pill px-4 py-2" style="background-color: var(--card-bg-light); border-color: var(--border-light); color: var(--primary-color); font-weight: 600; box-shadow: var(--shadow-light);">
                <i class="bi bi-folder-fill me-2"></i> Materi Tambahan
            </button>
        </div>

        <!-- Additional Materials -->
        @if($materi->count() > 0)
          <div class="row g-4">
            @foreach ($materi as $item)
              <div class="col-12 col-md-6 col-lg-4">
            <div class="material-card" id="additional-material-{{ $item->id }}">
            <div class="card-body p-4 d-flex flex-column justify-content-between">
              <h5 class="card-title fw-bold mb-3" style="color: var(--text-dark-primary);">
              <i class="bi bi-file-earmark-text me-2" style="color: var(--text-dark-secondary);"></i> {{ $item->judul }}
              </h5>

              @if ($item->file)
              @php
                $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
              @endphp

              @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                <img src="{{ asset('storage/' . $item->file) }}" alt="Preview Gambar"
                  class="img-fluid rounded mb-3" style="max-height: 180px; object-fit: cover;">
                </a>
              @elseif ($ext === 'mp4')
                <video class="w-100 mb-3 rounded" style="max-height: 180px;" controls>
                <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                Browser tidak mendukung video.
                </video>
              @elseif ($ext === 'pdf')
                <embed src="{{ asset('storage/' . $item->file) }}" type="application/pdf" width="100%" height="180px" class="rounded mb-3"/>
              @else
                <div class="file-preview mb-3 rounded border p-2 text-center" style="height: 180px; background-color: #f1f3f5; border-color: var(--border-light);">
                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-decoration-none">
                  <i class="bi bi-file-earmark-text display-4 mb-2" style="color: var(--text-dark-secondary);"></i>
                  <p class="mb-0" style="color: var(--text-dark-primary);">{{ basename($item->file) }}</p>
                  <small style="color: var(--text-dark-secondary);">({{ strtoupper($ext) }})</small>
                </a>
                </div>
              @endif
              @endif

              <p class="card-text text-muted mb-4" style="min-height: 3rem; color: var(--text-dark-secondary) !important;">
              {{ \Illuminate\Support\Str::limit(strip_tags($item->konten), 100, '...') }}
              </p>

              <div class="mb-3">
              <small class="text-muted" style="color: var(--text-dark-secondary) !important;">
                <i class="bi bi-calendar3 me-1"></i>
                Diunggah: <strong>{{ $item->created_at->format('d M Y') }}</strong>
              </small>
              </div>

              <div class="d-grid gap-2">
              <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-material" style="background: var(--info-color);">
                <i class="bi bi-eye me-2"></i> Lihat File
              </a>
              <a href="{{ route('guru.materi.edit', $item->id) }}" class="btn btn-material btn-success">
                <i class="bi bi-pencil-square me-2"></i> Edit
              </a>
              <form action="{{ route('guru.materi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-material btn-danger">
                <i class="bi bi-trash me-2"></i> Hapus
                </button>
              </form>
              </div>
            </div>
            </div>
              </div>
            @endforeach
          </div>
        @endif
    </div>

    <!-- Alert Template -->
    <div class="alert alert-success alert-dismissible fade position-fixed" role="alert" id="alert-notification" style="display: none; top: 20px; right: 20px; z-index: 1050; min-width: 350px;">
        <i class="bi bi-check-circle-fill me-2"></i>
        <span id="alert-message"></span>
        <button type="button" class="btn-close" onclick="materialSystem.closeAlert()"></button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sistem Penguncian Materi yang Ditingkatkan
        class MaterialLockingSystem {
            constructor() {
                this.MINIMUM_SCORE = 80; // Skor minimal yang diperlukan untuk membuka materi berikutnya
                this.STORAGE_PREFIX = 'material_'; // Prefix untuk kunci localStorage
                // Data materi, termasuk prasyarat dan status skor
                this.materials = {
                    1: { name: 'Fungsi Alat Ukur', prerequisite: null, score: 0, completed: false },
                    2: { name: 'Analisis Penggunaan Alat Ukur', prerequisite: [1], score: 0, completed: false },
                    3: { name: 'Penggunaan Alat Ukur', prerequisite: [1, 2], score: 0, completed: false },
                    4: { name: 'Pemeliharaan Alat Ukur', prerequisite: [1, 2, 3], score: 0, completed: false } // Added Material 4
                };
                this.init(); // Inisialisasi sistem saat objek dibuat
            }

            // Metode inisialisasi utama
            init() {
                this.loadProgress(); // Muat progress dari localStorage
                this.updateAllMaterialStates(); // Perbarui status UI semua materi
            }

            // Memuat skor dan status completed dari localStorage
            loadProgress() {
                for (let materialId in this.materials) {
                    const scoreKey = `${this.STORAGE_PREFIX}${materialId}_score`;
                    
                    // Ambil skor dari localStorage, default ke 0 jika tidak ada atau tidak valid
                    const savedScore = parseInt(localStorage.getItem(scoreKey)) || 0;
                    this.materials[materialId].score = savedScore;
                    // Tentukan status completed berdasarkan skor minimal
                    this.materials[materialId].completed = savedScore >= this.MINIMUM_SCORE;
                }
            }

            // Memperbarui status UI untuk semua materi
            updateAllMaterialStates() {
                // Iterasi dalam urutan memastikan prasyarat dihitung terlebih dahulu
                for (let i = 1; i <= Object.keys(this.materials).length; i++) {
                    this.updateMaterialState(i);
                }
            }

            // Memperbarui status UI materi individual (terkunci, tersedia, selesai)
            updateMaterialState(materialId) {
                const material = this.materials[materialId];
                const card = document.getElementById(`material-${materialId}`);
                if (!card) return; // Keluar jika elemen kartu tidak ditemukan

                const lockIndicator = card.querySelector('.lock-indicator');
                const button = card.querySelector('.btn-material');
                const progressIndicator = card.querySelector('.progress-indicator');
                const scoreDisplay = card.querySelector('.score-display');
                const scoreValueSpan = scoreDisplay ? scoreDisplay.querySelector('.score-value') : null;

                // Perbarui tampilan skor
                if (scoreValueSpan) {
                    scoreValueSpan.textContent = material.score;
                    // Tampilkan skor jika sudah ada data kuis (baik lulus atau gagal)
                    if (material.score > 0 || material.completed) {
                        scoreDisplay.style.display = 'block';
                        // Sesuaikan warna latar belakang skor berdasarkan apakah lulus atau tidak
                        if (material.completed) {
                            scoreDisplay.style.background = 'linear-gradient(135deg, var(--success-color), #388E3C)'; // Use success gradient
                        } else {
                            scoreDisplay.style.background = 'linear-gradient(135deg, var(--danger-color), #D32F2F)'; // Use danger gradient
                        }
                    } else {
                        scoreDisplay.style.display = 'none'; // Sembunyikan jika belum ada skor
                    }
                }

                // Materi 1 selalu tersedia
                if (materialId === 1) {
                    this.unlockMaterial(materialId); // Pastikan Material 1 tidak terkunci secara visual
                    if (progressIndicator) {
                        if (material.completed) {
                            progressIndicator.className = 'progress-indicator progress-completed';
                            progressIndicator.querySelector('i').className = 'bi bi-check-circle-fill';
                        } else {
                            progressIndicator.className = 'progress-indicator progress-available';
                            progressIndicator.querySelector('i').className = 'bi bi-play-fill';
                        }
                    }
                    return; // Tidak perlu memeriksa prasyarat untuk Materi 1
                }

                // Cek prasyarat untuk materi lain
                let allPrerequisitesMet = true;
                let unlockMessage = '';
                if (material.prerequisite) {
                    const missingPrereqNames = [];
                    for (const prereqId of material.prerequisite) {
                        const prereqMaterial = this.materials[prereqId];
                        if (!prereqMaterial || prereqMaterial.score < this.MINIMUM_SCORE) {
                            allPrerequisitesMet = false;
                            missingPrereqNames.push(`Materi ${prereqId}`);
                        }
                    }
                    if (!allPrerequisitesMet) {
                        unlockMessage = `Selesaikan kuis ${missingPrereqNames.join(' & ')} dengan skor minimal ${this.MINIMUM_SCORE} untuk membuka materi ini`;
                    }
                }

                if (allPrerequisitesMet) {
                    this.unlockMaterial(materialId); // Buka materi
                    if (progressIndicator) {
                        if (material.completed) {
                            progressIndicator.className = 'progress-indicator progress-completed';
                            progressIndicator.querySelector('i').className = 'bi bi-check-circle-fill';
                        } else {
                            progressIndicator.className = 'progress-indicator progress-available';
                            progressIndicator.querySelector('i').className = 'bi bi-play-fill';
                        }
                    }
                } else {
                    this.lockMaterial(materialId, unlockMessage); // Kunci materi dengan pesan
                    if (progressIndicator) {
                        progressIndicator.className = 'progress-indicator progress-locked';
                        progressIndicator.querySelector('i').className = 'bi bi-lock-fill';
                    }
                }
            }

            // Membuka materi (menghapus overlay terkunci dan mengaktifkan tombol)
            unlockMaterial(materialId) {
                const card = document.getElementById(`material-${materialId}`);
                if (!card) return;
                const lockIndicator = card.querySelector('.lock-indicator');
                const button = card.querySelector('.btn-material');
                
                card.classList.remove('locked-overlay');
                if (lockIndicator) {
                    lockIndicator.style.display = 'none';
                }
                if (button) {
                    button.disabled = false; // Aktifkan tombol
                }
            }

            // Mengunci materi (menambahkan overlay terkunci dan menonaktifkan tombol)
            lockMaterial(materialId, message) {
                const card = document.getElementById(`material-${materialId}`);
                if (!card) return;
                const lockIndicator = card.querySelector('.lock-indicator');
                const button = card.querySelector('.btn-material');
                
                card.classList.add('locked-overlay');
                if (lockIndicator) {
                    lockIndicator.style.display = 'flex';
                    const unlockRequirements = lockIndicator.querySelector('.unlock-requirements');
                    if (unlockRequirements) {
                        unlockRequirements.textContent = message;
                    }
                }
                if (button) {
                    button.disabled = true; // Nonaktifkan tombol
                }
            }

            // Fungsi untuk membuka materi (dengan simulasi loading)
            openMaterial(materialId) {
                const card = document.getElementById(`material-${materialId}`);
                if (!card) return;

                // Dapatkan tombol dari dalam kartu (tidak perlu meneruskan sebagai argumen)
                const buttonElement = card.querySelector('.btn-material');

                if (card.classList.contains('locked-overlay')) {
                    this.showAlert('Materi ini masih terkunci. Selesaikan materi sebelumnya terlebih dahulu.', 'warning');
                    return;
                }

                if (buttonElement) {
                    const originalText = buttonElement.innerHTML;
                    // Ganti teks tombol dengan spinner loading
                    buttonElement.innerHTML = '<div class="loading-spinner me-2"></div>Memuat...';
                    buttonElement.disabled = true;

                    // Simulasi penundaan untuk "membuka" materi
                    setTimeout(() => {
                        buttonElement.innerHTML = originalText; // Kembalikan teks asli tombol
                        buttonElement.disabled = false; // Aktifkan kembali tombol
                        this.showAlert(`Membuka materi ${materialId}: ${this.materials[materialId].name}...`, 'success');
                        // Di aplikasi nyata, Anda akan mengarahkan ke halaman materi di sini:
                        // window.location.href = `/guru/materi/material-${materialId}`;
                    }, 1500);
                }
            }

            // Mensimulasikan hasil kuis (lulus/gagal)
            simulateQuizResult(materialId, score) {
                const storageKey = `${this.STORAGE_PREFIX}${materialId}_score`;
                localStorage.setItem(storageKey, score.toString()); // Simpan skor
                this.materials[materialId].score = score; // Perbarui progres di memori
                this.materials[materialId].completed = score >= this.MINIMUM_SCORE; // Perbarui status completed

                this.updateAllMaterialStates(); // Hitung ulang dan perbarui status UI semua materi

                let message;
                let type;
                if (score >= this.MINIMUM_SCORE) {
                    message = `Selamat! Anda telah lulus kuis Materi ${materialId} (${this.materials[materialId].name}) dengan skor ${score}. Materi selanjutnya telah terbuka.`;
                    type = 'success';
                } else {
                    message = `Kuis Materi ${materialId} (${this.materials[materialId].name}) gagal dengan skor ${score}. Silakan coba lagi untuk membuka materi selanjutnya.`;
                    type = 'warning';
                }
                this.showAlert(message, type);
            }

            // Mengatur ulang semua progres kuis (untuk tujuan demo)
            resetAllProgress() {
                for (let materialId in this.materials) {
                    localStorage.removeItem(`${this.STORAGE_PREFIX}${materialId}_score`);
                    this.materials[materialId].score = 0;
                    this.materials[materialId].completed = false;
                }
                this.updateAllMaterialStates(); // Muat ulang progres dan perbarui UI
                this.showAlert('Semua progres kuis telah direset. Materi telah kembali terkunci.', 'info');
            }

            // Menampilkan pesan notifikasi kustom
            showAlert(message, type = 'success') {
                const alertElement = document.getElementById('alert-notification');
                const messageElement = document.getElementById('alert-message');
                
                if (!alertElement || !messageElement) return;

                // Perbarui gaya dan ikon alert berdasarkan jenis
                alertElement.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                messageElement.textContent = message;
                
                const icon = alertElement.querySelector('i');
                if (type === 'success') {
                    icon.className = 'bi bi-check-circle-fill me-2';
                } else if (type === 'warning') {
                    icon.className = 'bi bi-exclamation-triangle-fill me-2';
                } else if (type === 'danger') {
                    icon.className = 'bi bi-x-circle-fill me-2';
                } else if (type === 'info') {
                    icon.className = 'bi bi-info-circle-fill me-2';
                }
                
                alertElement.style.display = 'block'; // Tampilkan alert
                
                // Otomatis tutup setelah 4 detik
                setTimeout(() => {
                    this.closeAlert();
                }, 4000);
            }

            // Menutup pesan notifikasi kustom
            closeAlert() {
                const alertElement = document.getElementById('alert-notification');
                if (alertElement) {
                    alertElement.classList.remove('show');
                    alertElement.classList.add('fade');
                    // Sembunyikan setelah animasi fade out
                    setTimeout(() => {
                        alertElement.style.display = 'none';
                    }, 150); 
                }
            }
        }

        // Inisialisasi sistem penguncian materi saat DOM selesai dimuat
        let materialSystem;
        document.addEventListener('DOMContentLoaded', () => {
            materialSystem = new MaterialLockingSystem();
        });
    </script>
@endsection
