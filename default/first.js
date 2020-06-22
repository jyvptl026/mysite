var username = ['Jayvee'];

var usernameInput = prompt('What is your name?');

var result = username.indexOf(usernameInput) > -1 ? 'Welcome':'Your not able to login, ';

console.log(result);
result += ', ' + usernameInput;

alert(result);

document.getElementById('welcomeMsg').innerHTML=result;