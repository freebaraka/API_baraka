<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

// Require admin authentication
requireAdminAuth();

// Fetch all tree planters
$sql = "SELECT full_name, email, trees_planted, location, join_date FROM tree_planters ORDER BY join_date DESC";
$result = $conn->query($sql);

require_once 'includes/header.php';
?>

<div class="content-section">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
        <h2 class="section-title">Tree Planters (Admin View)</h2>
        <a href="admin_logout.php" style="background: #e74c3c; padding: 10px 20px; border-radius: 25px; color: white; text-decoration: none; font-weight: bold;">Logout Admin</a>
    </div>
    
    <p>Total planters: <strong><?php echo $result->num_rows; ?></strong></p>
    
    <?php if ($result->num_rows > 0): ?>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Trees Planted</th>
                        <th>Location</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    while ($row = $result->fetch_assoc()): 
                    ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo htmlspecialchars($row["full_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td>
                                <span style="background: #e8f4fd; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">
                                    <?php echo htmlspecialchars($row["trees_planted"]); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($row["location"]); ?></td>
                            <td><?php echo date('M j, Y', strtotime($row["join_date"])); ?></td>
                        </tr>
                    <?php 
                    $count++;
                    endwhile; 
                    ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="message" style="text-align: center; padding: 2rem;">No tree planters found.</div>
    <?php endif; ?>
    
    <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 10px;">
        <h3 style="color: #ff6b35; margin-bottom: 1rem;">Admin Actions</h3>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button onclick="exportPlanters()" style="width: auto;">Export to CSV</button>
            <button onclick="printPlanters()" style="background: #667eea; width: auto;">Print List</button>
            <button onclick="addSamplePlanters()" style="background: #38b000; width: auto;">Add Sample Data</button>
        </div>
    </div>
</div>

<script>
function exportPlanters() {
    alert('CSV export functionality would be implemented here.');
}

function printPlanters() {
    window.print();
}

function addSamplePlanters() {
    if (confirm('Add sample tree planters for testing?')) {
        window.location.href = 'add_sample_planters.php';
    }
}
</script>

<?php require_once 'includes/footer.php'; ?>