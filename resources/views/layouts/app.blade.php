<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    @vite('resources/css/app.css')
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #2dd4bf 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        /* Layout Structure */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            line-height: 1.7;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            /* padding: 2rem 0; */
        }

        /* Header Styles */
        .header {
            background: var(--primary-gradient);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #4f46e5;
        }

        .nav-link {
            font-weight: 500;
            color: #4b5563;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--primary-gradient);
            color: white;
        }
        ul {
    list-style: none; /* Remove bullets from all unordered lists */
    padding: 0;      /* Remove default padding */
            margin: 0;       /* Remove default margin */
        }
        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            padding: 2rem;
            flex: 1;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: static;
                margin-bottom: 2rem;
            }
        }

        /* General Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            line-height: 1.7;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
        }

        .card-body {
            padding: 2.5rem;
        }

        /* Button Styles */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255,255,255,0.1);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn:hover::after {
            opacity: 1;
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        .btn-warning {
            background: var(--warning-gradient);
            border: none;
            color: white;
        }

        .btn-danger {
            background: var(--danger-gradient);
            border: none;
        }

        .btn-secondary {
            background: var(--secondary-gradient);
            border: none;
            color: white;
        }

        /* Form Controls */
        .form-control {
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            padding: 0.875rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f9fafb;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background-color: #ffffff;
        }

        /* Comment Section */
        .comment-section {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .comment-card {
            background-color: #f9fafb;
            border-radius: 16px;
            margin-bottom: 1.25rem;
            padding: 1.5rem;
            border-left: 5px solid #6366f1;
            transition: all 0.3s ease;
        }

        .comment-card:hover {
            transform: translateX(5px);
            background-color: #f3f4f6;
        }

        /* Typography */
        .display-4 {
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border-radius: 6px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Layout & Grid System */
        .page-wrapper {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
            position: relative;
            min-height: calc(100vh - 300px);
        }

        @media (max-width: 992px) {
            .page-wrapper {
                grid-template-columns: 1fr;
            }
        }

        /* Content Organization */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            position: relative;
            z-index: 1;
            min-height: 100%;
            overflow-y: auto;
        }

        .content-header {
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            position: relative;
            z-index: 1;
        }

        .posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem; /* Space between grid items */
    padding: 1rem; /* Add padding around the grid */
    background-color: #f8f9fa; /* Light background for contrast */
    border-radius: 0.5rem; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

        /* Sidebar Improvements */
        .sidebar {
            position: sticky;
            top: 20px;
            height: calc(100vh - 200px);
            background: white;
            border-radius: 20px;
            /* padding: 1.5rem; */
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            overflow-y: auto;
            scrollbar-width: thin;
        }

        .sidebar-section {
            margin-bottom: 2rem;
        }

        .sidebar-section:last-child {
            margin-bottom: 0;
        }

        .category-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #4b5563;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
        }

        .category-link:hover {
            background: var(--primary-gradient);
            color: white;
            transform: translateX(5px);
        }

        .category-link.active {
            background: var(--primary-gradient);
            color: white;
        }

        .category-link .badge {
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .category-link:not(.active) .badge {
            background: var(--primary-gradient);
        }

        .category-list {
            display: flex;
            margin: 1rem;
            flex-direction: column;
        }

        /* Card Improvements */
        .post-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
        }

        .post-header {
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 1rem;
        }

        .post-content {
            flex: 1;
        }

        .post-footer {
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
            margin-top: auto;
        }

        /* Stats Section */
        .stats-grid {
            margin: 1rem;
            gap: 0.75rem;
        }

        .stat-card {
            background: var(--primary-gradient);
            color: white;
            gap: 0.5rem;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-card small {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        /* Hide scrollbar but keep functionality */
        .sidebar::-webkit-scrollbar {
            width: 0px;
        }

        .search-form {
            position: relative;
            width: 300px;
        }

        .search-input {
            border-radius: 50px !important;
            padding-left: 1rem !important;
            padding-right: 3rem !important;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid #e5e7eb;
        }

        .search-input:focus {
            background: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            border-color: #6366f1;
        }

        .search-form .btn {
            border-radius: 50px;
            padding: 0.5rem 1rem;
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
        }

        @media (max-width: 768px) {
            .search-form {
                width: 100%;
                margin: 1rem 0;
            }
        }

        /* Header Styles */
        .main-header {
            margin-bottom: 3rem;
        }

        .header-top {
            background: #0f172a;
            padding: 0.75rem 0;
            font-size: 0.875rem;
        }

        .header-contact {
            color: #cbd5e1;
        }

        .header-contact a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .header-contact a:hover {
            color: white;
        }

        .header-social .social-link {
            color: #cbd5e1;
            margin-left: 1.25rem;
            transition: all 0.3s ease;
        }

        .header-social .social-link:hover {
            color: white;
            transform: translateY(-2px);
        }

        .header-main {
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
            color: white;
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .header-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .header-wrapper {
            position: relative;
            z-index: 1;
        }

        .header-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .header-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .header-search {
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .search-box {
            display: flex;
            background: white;
            border-radius: 100px;
            padding: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            flex: 1;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            outline: none;
            background: transparent;
        }

        .search-box button {
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-box button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .header-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Footer Styles */
        .main-footer {
            background: #0f172a;
            color: #cbd5e1;
            margin-top: 6rem;
        }

        .footer-top {
            padding: 5rem 0 4rem;
        }

        .footer-brand {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-desc {
            opacity: 0.8;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: #3730a3;
            transform: translateY(-3px);
            color: white;
        }

        .footer-title {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .footer-links a i {
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-newsletter-text {
            opacity: 0.8;
            margin-bottom: 1.5rem;
        }

        .newsletter-form {
            display: flex;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 100px;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        .newsletter-form input {
            flex: 1;
            background: transparent;
            border: none;
            padding: 0.75rem 1.5rem;
            color: white;
            outline: none;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .newsletter-btn {
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            transform: translateY(-1px);
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            opacity: 0.8;
        }

        .footer-contact i {
            margin-right: 1rem;
            color: #3730a3;
        }

        .footer-bottom {
            background: rgba(0, 0, 0, 0.2);
            padding: 1.5rem 0;
            text-align: center;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .copyright {
            margin: 0;
            opacity: 0.8;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2rem;
        }

        .footer-bottom-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 2rem;
            }

            .header-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .footer-bottom-content {
                flex-direction: column;
                gap: 1rem;
            }

            .footer-bottom-links {
                justify-content: center;
            }
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-wrapper {
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .sidebar {
                position: relative;
                top: 0;
                max-height: none;
                height: auto;
                margin-bottom: 1rem;
                overflow: visible;
            }

            .main-content {
                width: 100%;
                overflow: visible;
            }

            /* Collapse categories on mobile */
            .category-list {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .category-link {
                flex: 1 1 auto;
                min-width: calc(50% - 0.5rem);
                padding: 0.5rem;
                font-size: 0.875rem;
            }

            /* Adjust stats grid for mobile */
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem;
            }

            .stat-card {
                padding: 0.75rem;
            }
        }

        /* Container adjustments */
        .container {
            width: 100%;
            /* padding-right: 15px;
            padding-left: 15px; */
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 1200px) {
            /* .container {
                max-width: 1140px;
            } */
        }

        /* Page Wrapper */
        .page-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            /* padding: 0 1rem; */
        }

        /* Sidebar */
        .sidebar {
            background: white;
            border-radius: 20px;
            /* padding: 1.5rem; */
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        /* Main Content */
        .main-content {
            background: white;
            border-radius: 20px;
            /* padding: 1.5rem; */
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        /* Desktop Layout */
        @media (min-width: 769px) {
            .page-wrapper {
                flex-direction: row;
            }

            .sidebar {
                width: 250px;
                position: sticky;
                top: 20px;
                height: calc(100vh - 100px);
                overflow-y: auto;
            }

            .main-content {
                flex: 1;
                min-width: 0;
            }
        }

        /* Mobile Layout */
        @media (max-width: 768px) {
            .sidebar {
                order: -1; /* Places sidebar above main content */
                width: 100%;
                max-height: 300px; /* Adjust this value as needed */
                overflow-y: auto;
            }

            .category-list {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 0.5rem;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
        }

        /* Scrollbar Styles */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body>
    

    <!-- Include Header Partial -->
    @include('partials._header')

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <div class="page-wrapper">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <!-- Profile Section -->
                    <div class="sidebar-section">
                        <h5 class="mb-3" style="text-align: center;">Quick Stats</h5>
                        <div class="stats-grid">
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalPosts }}</h3>
                                <small>Posts</small>
                            </div>
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalComments }}</h3>
                                <small>Comments</small>
                            </div>
                            <div class="stat-card">
                                <h3 class="mb-0">{{ $totalReplies }}</h3>
                                <small>Replies</small>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Section -->
                    <div class="sidebar-section">
                        <h5 class="mb-3" style="text-align: center;">Categories</h5>
                        <div class="category-list">
                            <a href="{{ route('posts.index') }}" 
                               class="category-link {{ !request('category') ? 'active' : '' }}">
                                <i class="fas fa-th-large me-2"></i>
                                All Posts
                                <span class="badge rounded-pill bg-primary ms-auto">{{ $totalPosts }}</span>
                            </a>
                            @foreach($categories as $category)
                                <a href="{{ route('posts.index', ['category' => $category->slug]) }}" 
                                   class="category-link {{ request('category') == $category->slug ? 'active' : '' }}">
                                    <i class="{{ $category->icon }} me-2"></i>
                                    {{ $category->name }}
                                    <span class="badge rounded-pill bg-primary ms-auto">{{ $category->posts_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </aside>

                <!-- Main Content Area -->
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer" style="text-align: center;">
            <hr class="mt-0 mb-0">
            <p class="text-center mb-0">&copy; 2024 BlogSpace. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    @vite('resources/js/app.js')
</body>
</html>