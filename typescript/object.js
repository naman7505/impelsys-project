var student = {
    studentId: 101,
    studentName: "Ayush",
    marks: 100,
    getResult: function () {
        if (this.marks >= 34) {
            return "Pass";
        }
        else {
            return "Fail";
        }
    }
};
student.email = "naman7505@gmail.com";
console.log("Student Id : " + student.studentId);
console.log("Student Name : " + student.studentName);
console.log("Marks : " + student.marks);
console.log("Result : " + student.getResult());
console.log("Email Id : " + student.email);
