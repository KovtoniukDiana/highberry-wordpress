
document.querySelectorAll('.pointer-div').forEach(imageDiv => {
    imageDiv.addEventListener('click', () => {
        let parentItem = imageDiv.closest('.grid-item'); 
        let infoBlock = parentItem.querySelector('.divider-text'); 
        let img = imageDiv.querySelector('img');

    
        document.querySelectorAll('.divider-text').forEach(block => {
            if (block !== infoBlock) {
                block.classList.remove('visible');
                block.classList.add('hidden');
            }
        });
        document.querySelectorAll('.pointer-div img').forEach(otherImg => {
            if (otherImg !== img) {
                otherImg.classList.remove('active-filter');
            }
        });

        
        infoBlock.classList.toggle('hidden');
        infoBlock.classList.toggle('visible');

        
        img.classList.toggle('active-filter');
    });
});