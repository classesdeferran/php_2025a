let regex1 = /abc/i;
const regex2 = new RegExp('abc') // Matches any letter (uppercase or lowercase)

regex1 = /a.c/i; // El punto (.) representa cualquier caracter pero solo una vez

console.log(regex1.test('abc')) 
console.log(regex1.test('aBc')) 
console.log(regex1.test('a1c')) 
console.log(regex1.test('a?c'))

regex1 = /a*c/i; // El asterisco (*) representa cero o más repeticiones del caracter anterior
console.log(regex1.test('ab33333c'))
console.log(regex1.test('222ac'))
console.log(regex1.test('a3333d'))

regex1 = /a+c/i; // El signo más (+) representa una o más repeticiones del caracter anterior
console.log(regex1.test('ab33333c'))
console.log(regex1.test('222acccccc'))

regex1 = /a?c/i; // El signo de interrogación (?) representa cero o una repetición del caracter anterior
console.log(regex1.test('ab33333c'))
console.log(regex1.test('ab33333'))
console.log(regex1.test('cacccc'))

regex1 = /a{2}c/i; // Las llaves ({}) representan un número específico de repeticiones del caracter anterior
console.log(regex1.test('ab33333c'))
console.log(regex1.test('aac'))
console.log(regex1.test('aabc'))

regex1 = /a{2,4}c/i; // Las llaves ({}) representan un rango de repeticiones del caracter anterior
console.log(regex1.test('ab33333c')) 
console.log(regex1.test('aac')) 
console.log(regex1.test('aacb')) 

regex1 = /[abc]/i; // Los corchetes ([]) representan un conjunto de caracteres
console.log(regex1.test('a'))
console.log(regex1.test('zb'))

regex1 = /[a-z\?]/
console.log(regex1.test('?'))
console.log(regex1.test('A'))

string = "maría"
string = "MARIA"
regex1 = /[A-Z]/
regex1 = /[a-zA-Z]/ 
console.log(regex1.test(string)) 

string = "í"
regex1 = /[í]/
console.log(regex1.test(string))

string = "María"
regex1 = /^[A-ZÑÇ]{1}[a-zí]{2,4}$/ // El símbolo (^) indica el inicio de la cadena
console.log(regex1.test(string)) 

string = "Maria"
regex1 = /^[A-ZÑÇ]{1}[a-zí]+$/ // El símbolo (^) indica el inicio de la cadena
console.log(regex1.test(string))

string = "María de las Mercedes"
string = "María de las Mercedes"
regex1 = /^[A-ZÑÇ]{1}[A-Za-zí\s]+$/ 
regex1 = /\w/
console.log(regex1.test(string))