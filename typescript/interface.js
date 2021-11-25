//Create the child class to implement the interface
var Employee = /** @class */ (function () {
    function Employee() {
    }
    // constructor(salary:number){
    //     this.salary=salary;
    // }
    //Implement getTax method of IEmployee interface
    Employee.prototype.getTax = function () {
        return this.salary * 10 / 100;
    };
    return Employee;
}());
//cteate object of child class
var emp = new Employee();
emp.salary = 100000;
console.log(emp.salary);
console.log(emp.getTax());
