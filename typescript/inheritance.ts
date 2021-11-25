//Paren Class
class Person{
    pName:string;
    age:number;

    constructor(pName:string, age:number)
    {
        this.pName=pName;
        this.age=age;
    }
}

//Child class
class Employee extends Person {
    eSalary: number;
    isActive: boolean;

    constructor(pName:string, age:number, eSalary:number, isActive:boolean){
        super(pName, age);
        this.eSalary=eSalary;
        this.isActive=isActive;
    }

    getNetSalary(): number {
        let netsal: number;

        if (this.isActive == true) {
            if (this.eSalary < 10000) {
                netsal = this.eSalary - (this.eSalary * 10 / 100);
            }
            else {
                netsal = this.eSalary - (this.eSalary * 15 / 100);
            }
        }
        else {
            netsal = 0;
        }
        return netsal;
    }
}


var employees:Employee[]=[
    new Employee("Ayush Kesarwani",25,6000, true ),
    new Employee("Abhishek Patel",28,14000, true),
    new Employee("Aqib",23,16000, true),
    new Employee("Pratyush",24,8000, true)

];

employees.push(new Employee("Abhishek",21,18000, true));

console.log("Print all the value using for loop...");

console.log("\n");

for(var i=0; i<=(employees.length-1); i++)
{
    console.log("Person : "+(i+1));
    console.log("Person Name: "+employees[i].pName);
    console.log("Age: "+employees[i].age);
    console.log("Salary: "+employees[i].eSalary);
    console.log("Activity: "+employees[i].isActive);
    console.log("Net Salary: "+employees[i].getNetSalary()); 
    console.log("\n");
}


