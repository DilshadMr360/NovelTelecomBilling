<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
    <div class="">

        <div class="flex flex-col md:flex-row w-full h-screen ">

            <div class="md:w-1/2 h-screen  bg-opacity-50  rounded-lg border md:bg-white md:rounded-none z-10">
                <div class="md:text-start mx-10 mt-10 text-center md:mt-20">
                    <h1 class="text-primaryColor font-anton md:text-5xl text-3xl">Welcome <span
                            class="text-black ">Back</span>
                    </h1>
                    <h1 class="text-black font-boogaloo text-2xl mt-5">Sign in with your email and password </h1>
                </div>
                <div class="w-10/12 py-10 mx-10">
                    <form action="#" class="md:bg-transparent md:px-0 md:py-0 bg-orange-50 bg-opacity-75 px-10 py-10 rounded-xl" method="POST">
                        @csrf
                        <label for="" class="font-boogaloo text-gray-400 text-2xl ">Email Address</label>
                        <input type="email" name="email" value="" required id="email"
                            class="w-full p-5 mt-2 text-black bg-white shadow-lg  rounded-2xl text-2xl font-boogaloo placeholder-gray-500"
                            placeholder="Enter Your Email">
                        <div class="mt-10">
                            <label for="" class="font-boogaloo text-gray-400 text-2xl ">Password</label>
                        </div>

                        <div class="relative">
                            <input type="password" name="password" value="" id="password"
                                class="w-full p-5 mt-2 rounded-2xl text-black bg-white shadow-lg placeholder-gray-500 font-bold"
                                placeholder="**********">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                <img id="toggleIcon" src="{{ asset('Images/hide.png') }}" alt="Toggle Password"
                                    class="w-8 h-8 mt-4">
                            </button>
                        </div>

                        <div class="flex justify-between mt-16">
                            <div class="flex items-center">
                                <input checked id="checked-checkbox" type="checkbox" value=""
                                    class="w-4 h-4 rounded-lg text-green-600 bg-green-600 border-green-300  focus:ring-green-600 accent-green-600">
                                <label for="checked-checkbox"
                                    class="ms-2 text-xl font-boogaloo text-gray-900 dark:text-gray-300 ">Remember
                                    me</label>
                            </div>
                            <a href="/forgetpassword"
                                class="flex justify-end rounded-lg md:text-xl  font-boogaloo hover:text-primaryColor text-gray-500 hover:bg-white text-lg">Forget
                                Password?</a>
                        </div>
                        <div></div>
                        <button type="submit"
                            class="w-[500px] py-2 ml-7 text-black bg-slate-500 rounded-3xl mt-5 font-boogaloo md:text-2xl ">SIGN
                            IN</button>
                        <a href="/register"
                            class="flex justify-start rounded-lg md:text-xl  mt-5 font-boogaloo text-gray-500 text-lg">Dont
                            have an Account?&nbsp;
                            <span class="hover:primaryColor hover-bg-white text-primaryColor text-2xl">Sign
                                Up</span></a>
                    </form>
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

                </div>

            </div>


            <div class="md:w-1/2 h-[770px]">
                <img src="{{ asset('Images/login.jpg') }}" alt="images"
                    class='w-full md:opacity-100 opacity-20 h-full' />
            </div>

        </div>
    </div>
</body>

</html>