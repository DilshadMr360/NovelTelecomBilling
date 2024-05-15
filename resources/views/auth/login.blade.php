<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
    <div class="flex flex-col md:flex-row w-full h-screen">
        <div class="md:w-1/2 h-screen bg-opacity-50 rounded-lg border md:bg-white md:rounded-none z-10">
            <div class="md:text-start mx-10 mt-10 text-center md:mt-20">
                <h1 class="text-primaryColor font-anton md:text-5xl text-3xl">Welcome <span class="text-black">Back</span></h1>
                <h2 class="text-black font-boogaloo text-2xl mt-5">Sign in with your email and password</h2>
            </div>
            <div class="w-10/12 py-10 mx-10 ">
                <form method="POST" action="{{ route('login.post') }}" class="bg-orange-50 bg-opacity-75 px-10 py-10 rounded-xl">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="font-boogaloo text-gray-400 text-2xl ml-6">Email Address</label>
                        <div class="ml-3">
                            <input type="email" name="email" id="email" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="Enter Your Email">
                            @error('email')
                                <div class="text-red-500 text-xs italic ml-6">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="font-boogaloo text-gray-400 text-2xl ml-6">Password</label>
                        <div class="relative ml-3">
                            <input type="password" name="password" id="password" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="**********">
                            <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                <img id="toggleIcon" src="{{ asset('Images/hide.png') }}" alt="Toggle Password" class="w-8 h-8 mt-2">
                            </button>
                            @error('password')
                                <div class="text-red-500 text-xs italic ml-6">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-5">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me" name="remember" class="w-4 h-4 rounded-lg text-green-600 bg-green-600 border-green-300 focus:ring-green-600 accent-green-600">
                            <label for="remember-me" class="ml-2 text-xl font-boogaloo text-gray-900">Remember me</label>
                        </div>
                        <a href="/forgetpassword" class="font-boogaloo hover:text-primaryColor text-gray-500 text-lg">Forget Password?</a>
                    </div>
                    <button type="submit" class="px-20 py-3 border justify-center ml-28 flex text-black w-[400px] bg-slate-700 rounded-3xl mt-5 font-boogaloo md:text-2xl">SIGN IN</button>
                    <a href="/register" class="block text-center font-boogaloo text-gray-500 text-lg mt-5">Don't have an Account? <span class="text-primaryColor">Sign Up</span></a>
                </form>
            </div>
        </div>
        <div class="md:w-1/2 h-full">
            <img src="{{ asset('Images/login.jpg') }}" alt="Login Image" class="w-full h-full opacity-100">
        </div>
    </div>
    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.src = "{{ asset('Images/view.png') }}";
            } else {
                passwordInput.type = "password";
                toggleIcon.src = "{{ asset('Images/hide.png') }}";
            }
        }
    </script>
</body>
</html>
