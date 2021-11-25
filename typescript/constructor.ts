class Employee {
    eName: string;
    eSalary: number;
    isActive: boolean;

    constructor(eName:string, eSalary:number, isActive:boolean){
        this.eName=eName;
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

var emp1:Employee;
emp1= new Employee("Ayush Kesarwani",6000, true );
// emp1.eName="Ayush Kesarwani";
// emp1.eSalary=8000;
// emp1.isActive=true;
console.log("Employee 1: ");
console.log("Name: "+emp1.eName);
console.log("Salary: "+emp1.eSalary);
console.log("Activity: "+emp1.isActive);
console.log("Net Salary: "+emp1.getNetSalary());

console.log("\n");              //Line break

var emp2:Employee= new Employee("Abhishek Patel",14000, true);
//emp2= new Employee();
// emp2.eName="Abhishek Patel";
// emp2.eSalary=12000;
// emp2.isActive=true;
console.log("Employee 2: ");
console.log("Name: "+emp2.eName);
console.log("Salary: "+emp2.eSalary);
console.log("Activity: "+emp2.isActive);
console.log("Net Salary: "+emp2.getNetSalary());


