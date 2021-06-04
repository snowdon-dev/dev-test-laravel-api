# Application

## Single page application

- Setup up your .env - works with sqlite
- To view the list of mesages goto /home and click the login button
- I have created a check to allow any user to pass login (just to prevent creating a register user popup)
- To send a mesasge type a message and click the send button
- Theres no front end validation, beacuse I did not setup Vue given the task is to create an API

## Making requests to the API

- First acquire a token, /api/sanctum/token `curl -X POST -d 'email=dale@snowdon.dev' -d 'password=123456789' -d 'device_name=curl' http://localhost:8000/api/sanctum/token`
- Next you can hit the API by giving your bearer token to an endpoint `curl -v -X POST -d 'message=asdfsdf' -H "Authorization: Bearer 1|u1R0XADNLodN2sDAUBFxOBge6ZVMVMCHt2AIPIt4" http://localhost:8000/api/messages`





























































