body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensures the body covers the full viewport height */
    margin: 0;
    background-image: url('https://wcconstructionco.com/wp-content/uploads/2023/05/NC-AT-Clock-Tower-5.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    background-color: #000080;
    color: #fff;
    padding: 20px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    width: 100%;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s; /* Smooth color transition */
}

nav ul li a:hover {
    color: #ffd700; /* Change color on hover */
}

.request-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjust according to your design */
    gap: 20px; /* Adjust the gap between grid items */
}

.request-container {
    font-size: 20px;
    background-color: rgba(255, 255, 255, 0.9); /* Adjust the alpha value to control transparency */
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    transition: transform 0.3s ease; 
}

.request-container:hover {
    transform: scale(1.05); /* Scale up the container on hover */
}

.request-title {
    font-weight: bold;
    margin-bottom: 5px;
}

.request-description {
    margin-bottom: 10px;
}

.request-status {
    font-style: italic;
    color: #007bff;
}

.cancel-button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.cancel-button:hover {
    background-color: #dc3545;
}

footer {
    background-color: #000080;
    color: #fff;
    text-align: center;
    padding: 10px 0; /* Reduce the padding */
    width: 100%;
    margin-top: auto; /* Pushes the footer to the bottom of the page */
}
