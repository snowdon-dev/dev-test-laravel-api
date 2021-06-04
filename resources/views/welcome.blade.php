<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body> 
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        <a id="loginBtn" class="text-sm text-gray-700 underline">Log in</a>
        <a id="registerBtn" class="ml-4 text-sm text-gray-700 underline">Register</a>
        <a id="logoutBtn" class="ml-4 text-sm text-gray-700 underline">Logout</a>


        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <form>
                            <label for="messageBody">Message body</label>
                            <textarea type="text" id="messageBody"></textarea>
                            <br>
                            <button type="button" id="submitMessageBtn">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div id="messageContainer">

                    </div>
                </div>
            </div>
        </div>

        
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
