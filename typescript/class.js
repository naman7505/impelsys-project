var Employee = /** @class */ (function () {
    function Employee() {
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
var emp1;
emp1 = new Employee();
emp1.eName = "Ayush Kesarwani";
emp1.eSalary = 8000;
emp1.isActive = true;
console.log("Employee 1: ");
console.log("Name: " + emp1.eName);
console.log("Salary: " + emp1.eSalary);
console.log("Activity: " + emp1.isActive);
console.log("Net Salary: " + emp1.getNetSalary());
console.log("\n"); //Line break
var emp2 = new Employee();
//emp2= new Employee();
emp2.eName = "Abhishek Patel";
emp2.eSalary = 12000;
emp2.isActive = true;
console.log("Employee 2: ");
console.log("Name: " + emp2.eName);
console.log("Salary: " + emp2.eSalary);
console.log("Activity: " + emp2.isActive);
console.log("Net Salary: " + emp2.getNetSalary());
