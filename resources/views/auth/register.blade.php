<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <body>
        <div class="flex flex-col md:flex-row w-full border">
    
            <div class="md:w-1/2 bg-opacity-50 rounded-lg md:bg-white md:rounded-none z-10">
                <div class="md:text-start mx-10 mt-10 text-center">
                    <h1 class="text-primaryColor font-anton md:text-5xl text-3xl">Register</h1>
                    <h1 class="text-black font-boogaloo text-2xl mt-5">Register with your email and password</h1>
                </div>
                <form action="{{ route('register') }}" class="md:bg-transparent md:px-0 md:py-0 bg-orange-50 bg-opacity-75 px-10 rounded-xl " method="POST">
                    @csrf
                    <div class="md:mt-10 mt-0">
                        <label for="" class="font-boogaloo text-gray-400 text-xl ml-6">Name</label>
                        <div class="ml-3">
                            <input type="name" name="name" value="" class="w-[500px] p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="User Name">
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        <label for="" class="font-boogaloo text-gray-400 text-xl md:mt-10 mt-5 ml-6">Email Address</label>
                        <div class=" ml-3">
                            <input type="email" name="email" value="" class="w-[500px] p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="savorupoh@gmail.com">
                        </div>
                        
                    </div>
                    <div class="mt-5">
                        <label for="" class="font-boogaloo text-gray-400 text-xl ml-6">Password</label>
                        <div class="relative">
                            <input type="password" name="password" value="" class="w-[500px]   ml-3  p-3 mt-2 rounded-2xl text-black bg-white shadow-lg placeholder-gray-500 font-bold" placeholder="**********" id="passwordInput">
                            {{-- <button type="button" onclick="togglePassword('passwordInput')" class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                <img id="toggleIconPassword" src="{{ asset('Images/hide.png') }}" alt="Toggle Password" class="w-8 h-8 mt-2">
                            </button> --}}
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="" class="font-boogaloo text-gray-400 text-xl ml-6">Confirm Password</label>
                        <div class="relative ml-3">
                            <input type="password" name="confirm_password" value="" class="w-full p-3 mt-2 rounded-2xl text-black bg-white shadow-lg placeholder-gray-500 font-bold " placeholder="**********" id="confirmpass">
                            {{-- <button type="button" onclick="togglePassword('confirmpass')" class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                <img id="toggleIcon" src="{{ asset('Images/hide.png') }}" alt="Toggle Password" class="w-8 h-8 mt-2">
                            </button> --}}
                        </div>
                    </div>
                    <div class="flex justify-between mt-8">
                       
                    </div>
                    <button type="submit" class=" px-20 py-3 justify-center ml-28 flex text-black w-[400px]  bg-slate-700 rounded-3xl mt-5 font-boogaloo md:text-2xl">SIGN UP</button>
                    <a href="" class="flex justify-start rounded-lg md:text-xl  mt-5 font-boogaloo text-gray-500 text-lg ml-3">Already have an Account?&nbsp;</a>
                    <a href="/login" class="font-boogaloo">
                        <span class="hover:primaryColor hover-bg-white text-primaryColor text-xl ml-3">Sign In</span>
                    </a>
                </form>
                <script>
                    function togglePassword(inputId) {
                        var passwordInput = document.getElementById(inputId);
                        var toggleIcon = document.querySelector('#' + inputId + ' + button img');
    
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            toggleIcon.src = "{{ asset('Images/view.png') }}";
                        } else {
                            passwordInput.type = "password";
                            toggleIcon.src = "{{ asset('Images/hide.png') }}";
                        }
                    }
                </script>
            </div>
    
            <div class="md:w-1/2 h-full">
                <img src="{{ asset('Images/register.jpg') }}" alt="image" class="w-full h-[820px] md:opacity-100 opacity-20 md:mt-0 -mt-[900px]">
            </div>
    
        </div>
    </body>
    
</body>
</html>