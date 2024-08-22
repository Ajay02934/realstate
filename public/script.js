document.addEventListener("DOMContentLoaded", function () {
    const allPromotionsBtn = document.getElementById('allPromotionsBtn');
    const newCustomersBtn = document.getElementById('newCustomersBtn');
    const promotionsSection = document.getElementById('promotions');

    function loadPromotions(view) {
   
        promotionsSection.innerHTML = '';

        
        const promotions = [
            { id: 1, title: "Promotion One", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et", onlyNewCustomers: true },
            { id: 2, title: "Promotion Two", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et", onlyNewCustomers: true },
            { id: 3, title: "Promotion Three", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et", onlyNewCustomers: true },
            { id: 4, title: "Promotion Four", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et", onlyNewCustomers: true },
            
        ];

        const customers = [
            { id: 1, title: "Promotion Ten", description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et", onlyNewCustomers: true },
            
        ];

        
        const itemsToDisplay = view === 'new' ? customers : promotions;

        itemsToDisplay.forEach(item => {
            if (view === 'new' && !item.onlyNewCustomers) return;

            const itemCard = document.createElement('div');
            itemCard.classList.add('promotion-card');

            
            itemCard.innerHTML = `
                <h2>${item.title}</h2>
                <p>${item.description}</p>
                ${view === 'new' ? `
                    <div class="terms-and-join">
                        
                         <button class="join-now-btn">Terms and Conditions</button>
                        <button class="join-now-btn">Join Now</button>
                    </div>
                ` : ''}
            `;

            promotionsSection.appendChild(itemCard);
        });
    }

    allPromotionsBtn.addEventListener('click', () => loadPromotions('all'));
    newCustomersBtn.addEventListener('click', () => loadPromotions('new'));

    
});