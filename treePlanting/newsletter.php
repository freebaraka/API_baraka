<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<div class="content-section">
    <h2 class="section-title">Tree Planting Newsletter</h2>
    <p class="date"><?php echo date('F d, Y'); ?></p>
    
    <div class="newsletter">
        <h3>Growing Hope: The Power of Planting Trees</h3>
        
        <p class="verse">"The trees of the Lord are well watered, the cedars of Lebanon that he planted."</p>
        <p class="reference">Psalm 104:16 (NIV)</p>
        
        <h4>Reflection</h4>
        <p>Planting trees is more than an environmental act—it's a symbol of hope and renewal. Each tree planted helps restore the earth, provides shelter for wildlife, and improves air quality for generations to come.</p>
        
        <p>As we work together to plant trees, we are reminded of our responsibility to care for creation and to leave a legacy of stewardship and growth.</p>
        
        <h4>Application</h4>
        <p>This week, consider how you can contribute to tree planting efforts:</p>
        <ol>
            <li>Volunteer for a local tree planting event</li>
            <li>Educate others about the benefits of trees</li>
            <li>Support organizations dedicated to reforestation</li>
            <li>Plant a tree in your own yard or community</li>
        </ol>
        
        <h4>Prayer</h4>
        <p>Creator God, thank you for the gift of trees and the beauty of your creation. Help us to be faithful stewards, caring for the earth and planting seeds of hope for the future. Bless our efforts and multiply their impact. Amen.</p>
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <button>Download PDF Version</button>
        <button style="background: var(--accent); margin-left: 10px;">Share with Friend</button>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>