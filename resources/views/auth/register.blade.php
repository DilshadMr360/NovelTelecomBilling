<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>
    <div class="flex flex-col md:flex-row w-full border">

        <div class="md:w-1/2 bg-opacity-50 rounded-lg md:bg-white md:rounded-none z-10">
            <div class="md:text-start mx-10 mt-10 text-center">
                <h1 class="text-primaryColor font-anton md:text-5xl text-3xl">Register</h1>
                <h1 class="text-black font-boogaloo text-2xl mt-5">Register with your email and password</h1>
            </div>
            <div class="w-10/12 py-10 mx-10 ">

            <form method="POST" action="{{ route('register.post') }}" class="bg-orange-50 bg-opacity-75 px-10 py-10 rounded-xl ">
                @csrf
                <div class="md:mt-10 mt-0 ">
                    <label for="name" class="font-boogaloo text-gray-400 text-xl ml-6">Name</label>
                    <div class="ml-3">
                        <input type="text" name="name" id="name" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="User Name">
                        @error('name')
                            <p class="text-red-500 text-xs italic ml-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="email" class="font-boogaloo text-gray-400 text-xl md:mt-10 mt-5 ml-6">Email Address</label>
                    <div class="ml-3">
                        <input type="email" name="email" id="email" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="example@gmail.com">
                        @error('email')
                            <p class="text-red-500 text-xs italic ml-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="password" class="font-boogaloo text-gray-400 text-xl ml-6">Password</label>
                    <div class="relative ml-3">
                        <input type="password" name="password" id="password" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="**********">
                        @error('password')
                            <p class="text-red-500 text-xs italic ml-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="confirm_password" class="font-boogaloo text-gray-400 text-xl ml-6">Confirm Password</label>
                    <div class="relative ml-3">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-3 mt-2 text-black bg-white shadow-lg rounded-2xl text-2xl font-boogaloo placeholder-gray-500" placeholder="**********">
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs italic ml-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="px-20 py-3 border justify-center ml-28 flex text-black w-[400px] bg-slate-700 rounded-3xl mt-5 font-boogaloo md:text-2xl">SIGN UP</button>
                <div class="flex mt-5 ml-3  text-center justify-center">
                    <span class="font-boogaloo  text-gray-500 text-lg">Already have an Account?&nbsp;</span>
                    <a href="/login" class="font-boogaloo text-primaryColor text-xl hover:bg-white">Sign In</a>
                </div>
            </form>
            </div>
        </div>

        <div class="md:w-1/2 h-full">
            <img src="{{ asset('Images/register.jpg') }}" alt="Register" class="w-full h-[820px] md:opacity-100 opacity-20 md:mt-0 -mt-[900px]">
        </div>

    </div>
</body>
</html>
