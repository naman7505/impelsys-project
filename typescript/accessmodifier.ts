//Parent Class
class Person{
    public pName:string;
    private age:number;
    protected address:string;

    constructor(pName:string, age:number, address:string)
    {
        this.pName=pName;
        this.age=age;
        this.address=address;
    }
}

//Child class
class Employee extends Person {
    eSalary: number;
    isActive: boolean;

    constructor(pName:string, age:number, address:string, eSalary:number, isActive:boolean){
        super(pName, age, address);         //use super keyword to declare parent class property
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
    new Employee("Ayush Kesarwani",25,"Prayagraj",6000, true ),
    new Employee("Abhishek Patel",28,"Lucknow",14000, true),
    new Employee("Aqib",23,"Delhi",16000, true),
    new Employee("Pratyush",24,"Chennai",8000, true)

];

employees.push(new Employee("Abhishek",21,"Agra",18000, true));

console.log("Print all the value using for loop...");

console.log("\n");

for(var i=0; i<=(employees.length-1); i++)
{
    console.log("Person : "+(i+1));
    console.log("Person Name: "+employees[i].pName);
    //console.log("Age: "+employees[i].age);
    //console.log("Age: "+employees[i].address);
    console.log("Salary: "+employees[i].eSalary);
    console.log("Activity: "+employees[i].isActive);
    console.log("Net Salary: "+employees[i].getNetSalary()); 
    console.log("\n");
}


