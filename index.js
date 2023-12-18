const grade = window.document.getElementById("grade");

// TODO: fazer pegar menu e colocar em grade

const endPoint = `menu.php`;
fetch(endPoint)
.then(res => res.json())
.then(res => {
    grade.innerHTML = res;
})