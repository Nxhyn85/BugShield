<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html{
            scroll-behavior: smooth;
        }
        /* Custom styles here */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #060d18;
            z-index: 0; /* Ensure particles are behind content */
        }
        #particles-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            
        }
        .testimonial-carousel {
            display: flex;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: 20px;
            scroll-snap-type: x mandatory;
        }

        .testimonial-carousel::-webkit-scrollbar {
            display: none;
        }

        .testimonial {
            min-width: 300px; /* Fixed width for each testimonial */
            flex: 0 0 auto;
            margin-right: 20px; /* Space between testimonials */
            padding: 20px; /* Adjust padding as needed */
            scroll-snap-align: center;
        }

        /* Box styling for each testimonial */
        .testimonial {
            background-color: #2d3748; /* Gray-800 color */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #fff;
            max-width: 400px; /* Optional: max width to ensure a box-like appearance */
        }

        #backToTop {
            transition: opacity 0.3s ease-in-out;
        }

        #backToTop.show {
            display: block;
            opacity: 1;
        }

        #backToTop.hidden {
            opacity: 0;
        }



    </style>
</head>
<body class="bg-gray-900 text-white">

    <!-- Navigation -->
    <nav class="bg-gray-800 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">{{ config('app.name', 'Laravel') }}</h1>
            </div>
            <div>
                <a href="#" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                <a href="#about" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">About</a>
                <a href="#contact" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                <a href="{{ route('leaderboard') }}" class="text-gray-300 hover:text-gray-400 px-3 py-2 rounded-md text-sm font-medium">Leaderboard</a>
            </div>
        </div>
    </nav>

     <!-- Hero Section with particles.js -->
    <section id="particles-container" class="relative bg-gradient-to-r from-gray-800 to-gray-700 py-20 h-screen">
        <div id="particles-js" class="absolute top-0 left-0 w-full h-full"></div> <!-- Particles container -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 flex flex-col justify-center items-center">
            <h2 class="text-6xl font-extrabold mb-4">Join {{ config('app.name', 'Laravel') }}</h2>
            <p class="text-xl">Join our platform & make the internet more secure. Earn rewards for reporting vulnerabilities. Together let's make the internet safer.</p>
            <a href="{{ route('register') }}" class="mt-8 inline-block bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-semibold">Get Started</a>
        </div>
    </section>


    <!-- About Section -->
    <section class="bg-gray-800 py-16" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-60 items-center">
            <div class="text-center md:text-left">
                <h2 class="text-4xl font-extrabold mb-4">About Our Platform</h2>
                <p class="text-lg">We provide an easy UI, a secure and rewarding environment for security researchers.</p>
            </div>
            <div class="text-center md:text-right">
                <img src="{{ asset('images/bb.png') }}" alt="About Image" class="rounded-lg shadow-xl w-64 h-64 md:w-96 md:h-96">
            </div>
        </div>
    </div>
</section>


<section class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold mb-6">Why Choose Us?</h2>
            <p class="text-xl">We provide a secure and rewarding environment for ethical hackers.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="bg-gray-800 rounded-lg shadow-xl p-8 transition duration-300 transform hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">Secure Platform</h3>
                <p class="text-lg">We take privacy seriously and ensure that all information shared with us is handled securely and confidentially.</p>
            </div>
            <div class="bg-gray-800 rounded-lg shadow-xl p-8 transition duration-300 transform hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">Fast Response</h3>
                <p class="text-lg">Our security team is always on the lookout for vulnerabilities to help you.</p>
            </div>
            <div class="bg-gray-800 rounded-lg shadow-xl p-8 transition duration-300 transform hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">Generous Rewards</h3>
                <p class="text-lg">We give rewards for reporting vulnerabilities.</p>
            </div>
        </div>
    </div>
</section>


<section class="bg-gray-800 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold mb-6">How It Works</h2>
            <p class="text-xl">Joining our {{ config('app.name', 'Laravel') }} is simple and straightforward.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="bg-gray-900 rounded-lg shadow-xl p-8 text-center transform transition duration-300 hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">1. Find Vulnerabilities</h3>
                <p class="text-lg">Chose a program & start finding vulnerabilities.</p>
            </div>
            <div class="bg-gray-900 rounded-lg shadow-xl p-8 text-center transform transition duration-300 hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">2. Report Issues</h3>
                <p class="text-lg">Found a vulnerability? Report it. Our team will response to you as soon as possible.</p>
            </div>
            <div class="bg-gray-900 rounded-lg shadow-xl p-8 text-center transform transition duration-300 hover:scale-105">
                <h3 class="text-2xl font-bold mb-4">3. Get Rewarded</h3>
                <p class="text-lg">We give rewards for reporting valid security vulnerabilities.</p>
            </div>
        </div>
    </div>
</section>

<!-- Carosel -->
<section class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold mb-6 text-white">What Our Hackers Say</h2>
        </div>
        <div class="testimonial-carousel mt-12" id="testimonialCarousel">
            <div class="testimonial bg-gray-800 rounded-lg shadow-xl p-8">
                <p class="text-lg text-white w-4xl">"I found the process smooth and rewarding. Great platform! "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias exercitationem error veritatis ex sed velit nam ad recusandae, quaerat aliquid autem saepe praesentium. Iste vitae et ducimus nulla explicabo repellendus.</p>
            </div>
            <div class="testimonial bg-gray-800 rounded-lg shadow-xl p-8">
                <p class="text-lg text-white w-4xl">"The team responded quickly to my submissions. Highly recommended."Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias exercitationem error veritatis ex sed velit nam ad recusandae, quaerat aliquid autem saepe praesentium. Iste vitae et ducimus nulla explicabo repellendus.</p>
            </div>
            <div class="testimonial bg-gray-800 rounded-lg shadow-xl p-8">
                <p class="text-lg text-white w-4xl">"Excellent platform! The rewards are generous."Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias exercitationem error veritatis ex sed velit nam ad recusandae, quaerat aliquid autem saepe praesentium. Iste vitae et ducimus nulla explicabo repellendus.</p>
            </div>
            <div class="testimonial bg-gray-800 rounded-lg shadow-xl p-8">
                <p class="text-lg text-white w-4xl">"Joining was easy and the process was clear."Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias exercitationem error veritatis ex sed velit nam ad recusandae, quaerat aliquid autem saepe praesentium. Iste vitae et ducimus nulla explicabo repellendus.</p>
            </div>
            <div class="testimonial bg-gray-800 rounded-lg shadow-xl p-8">
                <p class="text-lg text-white w-4xl">"I appreciate the emphasis on security and ethical hacking."Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias exercitationem error veritatis ex sed velit nam ad recusandae, quaerat aliquid autem saepe praesentium. Iste vitae et ducimus nulla explicabo repellendus.</p>
            </div>
        </div>
    </div>
</section>


   <!-- FAQ Section -->
<section class="bg-gray-800 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold mb-6">FAQ</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <!-- Question 1 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">What is a {{ config('app.name', 'Laravel') }}?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">A {{ config('app.name', 'Laravel') }} is a crowdsourcing initiative that rewards individuals for finding and reporting software bugs.</p>
            </div>

            <!-- Question 2 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">How can I participate?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">To participate, you need to register, find vulnerabilities, and submit your findings according to our guidelines.</p>
            </div>

            <!-- Question 3 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">Is there a reward for reporting bugs?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">Yes, we offer rewards based on the severity and impact of the reported vulnerabilities.</p>
            </div>

            <!-- Question 4 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">How do you handle confidential information?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">We take privacy seriously and ensure that all information shared with us is handled securely and confidentially.</p>
            </div>

            <!-- Question 5 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">How are bug reports evaluated?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">Bug reports are evaluated based on their severity, impact, and reproducibility. Our team conducts thorough assessments to verify reported issues.</p>
            </div>

            <!-- Question 6 -->
            <div class="bg-gray-900 rounded-lg shadow-xl p-8">
                <button class="text-left w-full flex justify-between items-center focus:outline-none">
                    <h3 class="text-2xl font-bold">Can I report multiple vulnerabilities?</h3>
                    <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <p class="text-lg hidden mt-4">Yes, you can report multiple vulnerabilities as long as they meet our reporting criteria.</p>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section class="bg-gray-900 py-16" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-extrabold mb-6">Contact Us</h2>
                <p class="text-xl">Have questions or need support? Contact our team for assistance.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <a href="#" class="inline-block bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-lg font-semibold">Contact</a>
            </div>
        </div>
    </section>

    <!-- Back to Top Icon -->
<a href="#" id="backToTop" class="fixed bottom-8 right-8 bg-red-500 text-white p-3 rounded-full shadow-lg hidden">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
    </svg>
</a>

    <!-- Footer -->
    <footer class="bg-gray-800 py-8 text-center">
        <p class="text-gray-400">&copy; 2024 {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
    </footer>


    <script>
    document.querySelectorAll('.bg-gray-900 button').forEach(item => {
        item.addEventListener('click', event => {
            const isOpen = item.nextElementSibling.classList.contains('hidden');
            item.nextElementSibling.classList.toggle('hidden', !isOpen);
            const svg = item.querySelector('svg');
            svg.classList.toggle('rotate-180', isOpen);
        });
    });
</script>
<script src="{{ asset('js/particles.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/stats.js') }}"></script>
    <script>
        // Initialize particles.js
        document.addEventListener('DOMContentLoaded', function() {
            particlesJS.load('particles-js', 'particles.json', function() {
                console.log('particles.js loaded');
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('testimonialCarousel');
    const testimonials = Array.from(carousel.children);
    const testimonialWidth = testimonials[0].offsetWidth;
    let scrollPosition = 0;

    function moveCarousel() {
        scrollPosition += testimonialWidth + 20; // Add 20 for margin-right

        if (scrollPosition >= carousel.scrollWidth - carousel.offsetWidth) {
            scrollPosition = 0;
            carousel.scrollTo({
                left: scrollPosition,
                behavior: 'auto'
            });
        } else {
            carousel.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        }
    }

    setInterval(moveCarousel, 3000); // Adjust the interval time as needed
});


document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('backToTop');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('show');
                    backToTopButton.classList.remove('hidden');
                } else {
                    backToTopButton.classList.add('hidden');
                    backToTopButton.classList.remove('show');
                }
            });

            backToTopButton.addEventListener('click', function(event) {
                event.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

</script>



</body>
</html>
