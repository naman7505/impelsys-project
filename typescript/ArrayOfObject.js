var Employee = /** @class */ (function () {
    function Employee(eName, eSalary, isActive) {
        //constructor(eName:string, eSalary:number, isActive:boolean){
        this.eName = eName;
        this.eSalary = eSalary;
        this.isActive = isActive;
    }
    Employee.prototype.getNetSalary = function () {
        var netsal;
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
    };
    return Employee;
}());
var employees = [
    new Employee("Ayush Kesarwani", 6000, true),
    new Employee("Abhishek Patel", 14000, true),
    new Employee("Aqib", 16000, true),
    new Employee("Pratyush", 8000, true)
];
employees.push(new Employee("Abhishek", 18000, true));
// emp1.eName="Ayush Kesarwani";
// emp1.eSalary=8000;
// emp1.isActive=true;
console.log("Employee 1: ");
console.log("Name: " + employees[0].eName);
console.log("Salary: " + employees[0].eSalary);
console.log("Activity: " + employees[0].isActive);
console.log("Net Salary: " + employees[0].getNetSalary());
console.log("\n"); //Line break
//var emp2:Employee= new Employee("Abhishek Patel",14000, true);
//emp2= new Employee();
// emp2.eName="Abhishek Patel";
// emp2.eSalary=12000;
// emp2.isActive=true;
console.log("Employee 2: ");
console.log("Name: " + employees[1].eName);
console.log("Salary: " + employees[1].eSalary);
console.log("Activity: " + employees[1].isActive);
console.log("Net Salary: " + employees[1].getNetSalary());
console.log("\n"); //Line break
console.log("Employee 3: ");
console.log("Name: " + employees[2].eName);
console.log("Salary: " + employees[2].eSalary);
console.log("Activity: " + employees[2].isActive);
console.log("Net Salary: " + employees[2].getNetSalary());
console.log("\n"); //Line break
console.log("Employee 4: ");
console.log("Name: " + employees[3].eName);
console.log("Salary: " + employees[3].eSalary);
console.log("Activity: " + employees[3].isActive);
console.log("Net Salary: " + employees[3].getNetSalary());
console.log("\n"); //Line break
console.log("Employee 5: ");
console.log("Name: " + employees[4].eName);
console.log("Salary: " + employees[4].eSalary);
console.log("Activity: " + employees[4].isActive);
console.log("Net Salary: " + employees[4].getNetSalary());
console.log("\n");
console.log("\n");
console.log("Print all the value using for loop...");
console.log("\n");
for (var i = 0; i <= (employees.length - 1); i++) {
    console.log("Employee : " + i);
    console.log("Name: " + employees[i].eName);
    console.log("Salary: " + employees[i].eSalary);
    console.log("Activity: " + employees[i].isActive);
    console.log("Net Salary: " + employees[i].getNetSalary());
    console.log("\n");
}
