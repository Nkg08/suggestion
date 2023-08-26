const menuIcon = document.getElementById("menu-icon");
const navLinks = document.getElementById("nav-links");
const sidebar = document.querySelector(".sidebar");

menuIcon.addEventListener("click", () => {
    navLinks.classList.toggle("show");
    sidebar.classList.toggle("active");
});
function toggleMenu() {
    const links = document.querySelector('.links');
    links.classList.toggle('show');
  }
  
  document.getElementById("suggestion-form").addEventListener("submit", function (event) {
    event.preventDefault();

    
    const formData = new FormData(event.target);
    for (let pair of formData.entries()) {
        console.log(pair[0] + ": " + pair[1]);
    }

    
    event.target.reset();
});

function updateFileName(input) {
const fileNameLabel = document.getElementById('file-name-label');

if (input.files.length > 0) {
fileNameLabel.textContent = input.files[0].name;
} else {
fileNameLabel.textContent = 'No file chosen';
}
}


const thoughts = [
    "Offering suggestions fosters collaboration and teamwork, driving collective growth and success.",
    "Sharing suggestions can provide fresh perspectives that lead to innovative solutions.",
    "Giving thoughtful suggestions demonstrates your engagement and commitment to a project or task.",
    "Suggesting improvements shows your dedication to constant learning and self-improvement.",
    "Constructive suggestions can lead to enhanced efficiency and streamlined processes.",
    "Offering ideas encourages open communication, creating a culture of continuous feedback.",
    "Providing suggestions helps build trust and strengthens relationships within teams.",
    "Sharing insights and recommendations highlights your expertise and value in a group.",
    "Well-considered suggestions contribute to a culture of problem-solving and adaptability.",
    "Offering suggestions can lead to better decision-making by considering diverse viewpoints.",
    "Providing feedback and suggestions can lead to personal and professional growth for others.",
    "Sharing ideas encourages a positive environment where everyone's input is valued.",
    "Giving well-thought-out suggestions boosts your credibility and reputation as a resource.",
    "Offering suggestions encourages a culture of learning from each other's experiences.",
    "Providing recommendations can help others avoid mistakes and pitfalls you've encountered.",
    "Suggesting improvements demonstrates your dedication to the success of the project.",
    "Sharing suggestions fosters a sense of ownership and accountability in the team.",
    "Offering guidance and insights can contribute to a more supportive and harmonious workplace.",
    "Providing suggestions reinforces the idea that we're all on a journey of growth together.",
    "Giving suggestions empowers individuals to contribute positively to the team's objectives."
];

const thoughtBox = document.getElementById("thought-box");
let currentThoughtIndex = 0;

function displayNextThought() {
    thoughtBox.textContent = thoughts[currentThoughtIndex];
    currentThoughtIndex = (currentThoughtIndex + 1) % thoughts.length;
}

displayNextThought(); 

setInterval(displayNextThought, 5000); 

