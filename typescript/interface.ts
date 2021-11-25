//Create Interface
interface IEmployee{
    salary:number;
    getTax():number;

}

//Create the child class to implement the interface
class Employee implements IEmployee{
    //Implements salary property of IEmployee interface
    salary:number;
    // constructor(salary:number){
    //     this.salary=salary;
    // }

    //Implement getTax method of IEmployee interface
    getTax():number
    {
        return this.salary*10/100;
    }
} 

//cteate object of child class

var emp:IEmployee=new Employee();
emp.salary=100000;
console.log(emp.salary);
console.log(emp.getTax());