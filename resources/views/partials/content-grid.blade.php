<!-- Main Content Grid -->
<div class="content-grid">
    <!-- Charts Section -->
    <div class="chart-section">
        <div class="section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.7;">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
            </svg>
            Student Enrollment Trends
        </div>
        <div class="chart-container">
            <canvas id="enrollmentChart"></canvas>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="activity-section">
        <div class="section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.7;">
                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Recent Activities
        </div>
        <div id="activityList">
            <div class="activity-item">
                <div class="activity-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="activity-info">
                    <h4>New Student Registered</h4>
                    <p>Maria Santos - BSIT Program</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                </div>
                <div class="activity-info">
                    <h4>Course Schedule Updated</h4>
                    <p>Computer Programming - Room 201</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <div class="activity-info">
                    <h4>Grade Submission</h4>
                    <p>Prof. Cruz submitted final grades</p>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <div class="activity-info">
                    <h4>Notification Sent</h4>
                    <p>Enrollment reminder to 150 students</p>
                </div>
            </div>
        </div>
    </div>
</div>