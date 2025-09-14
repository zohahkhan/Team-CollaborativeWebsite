document.addEventListener('DOMContentLoaded', function(){
	console.log('The website has loaded successfully!');
	
	const heading = document.querySelector('h1');
	if (heading){
		heading.style.cursor = 'pointer';
		
		heading.addEventListener('click', function(){
			const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            this.style.color = randomColor;
        });
    }
    
    const dateDiv = document.createElement('div');
    dateDiv.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #333;
        color: white;
        padding: 10px;
        border-radius: 5px;
        font-size: 12px;
    `;
    dateDiv.textContent = new Date().toDateString();
    document.body.appendChild(dateDiv);
    
    console.log('The interactive features are ready for use!');
});