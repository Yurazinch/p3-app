const points = document.querySelectorAll('.dashboard__sidebar-text');
const boards = document.querySelectorAll('.dashboard__wrapper');
points.forEach((point, index) => {
    point.addEventListener('click', () => {
        let i = Array.from(points).findIndex(el => el.classList.contains('active'));                    
        points[i].classList.remove('active');
        boards[i].classList.remove('show');
        points[index].classList.add('active');
        boards[index].classList.add('show');
    })
});