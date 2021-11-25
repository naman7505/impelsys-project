const h1=document.querySelector('#header-element');

h1.textContent;
h1.textContent='Prayagar is the Sungam City!';
h1.style.color='white';


const li=document.querySelector('li:last-of-type');
li.textContent= li.textContent + '(changed!)';

li.innerHTML=li.innerHTML+ '<li>item4</li>';

const ul=document.querySelector('ul');
// const ul=document.body.firstElementChild.nextElementSibling
ul.style.color='white';
// console.log(ul.querySelector('li:first-of-type'));
// console.log(ul.firstElementChild);
console.log(ul.children);
console.log(ul.childNodes);
console.log(ul.parentNode);
console.log(ul.parentElement);

console.log('get the siblings of the nodes');
console.log(ul.previousSibling);
console.log(ul.previousElementSibling);



const body=document.querySelector('body');

body.style.backgroundColor='black';



//Only the difference between parentNode and parentElement.
console.log('Only the difference between parentNode and parentElement.');
console.log(document.documentElement.parentNode);
console.log(document.documentElement.parentElement);


console.log(ul.nextSibling);    //text node
console.log(ul.nextElementSibling);    //input

const input=document.body.lastElementChild;
input.style.color='red';
input.style.borderColor='grey';

console.log(input);


//toggleing blocks
const section=document.querySelector('section');
const button=document.querySelector('button');
section.style.backgroundColor='blue';

button.addEventListener('click',()=>{

section.classList.toggle('visible');
section.classList.toggle('invisible');
});




const div=document.querySelector('div');
div.innerHTML='<p>Ayush Kesarwani is God</p>'



const list=document.querySelector('ul');
const newLi=document.createElement('li');
console.log(newLi);
list.append(newLi);
newLi.innerText='item6';

const newLi2=newLi.cloneNode(true);      //cloneNode() is use to make the clone of same text
list.append(newLi,newLi2);



