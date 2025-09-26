    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TCC - Student Management Dashboard</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                background: linear-gradient(135deg, # 0%, #2A0502 100%);
                min-height: 100vh;
                color: #3E0703;
            }
            
            .dashboard-container {
                padding: 2rem;
                background: white;
                margin: 1rem;
                border-radius: 20px;
                box-shadow: 0 20px 60px rgba(62, 7, 3, 0.1);
                min-height: calc(100vh - 2rem);
            }
            
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2.5rem;
                padding-bottom: 1.5rem;
                border-bottom: 2px solid rgba(62, 7, 3, 0.1);
            }
            
            .logo-section {
                display: flex;
                align-items: center;
                gap: 1rem;
            }
            
            .logo {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #3E0703, #5A0A05);
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: bold;
                font-size: 1.5rem;
                box-shadow: 0 8px 25px rgba(62, 7, 3, 0.3);
            }
            
            .college-info h1 {
                font-size: 1.8rem;
                font-weight: 700;
                color: #3E0703;
                margin-bottom: 0.2rem;
            }
            
            .college-info p {
                color: rgba(62, 7, 3, 0.7);
                font-size: 0.9rem;
            }
            
            .user-profile {
                display: flex;
                align-items: center;
                gap: 1rem;
                background: rgba(62, 7, 3, 0.05);
                padding: 0.8rem 1.2rem;
                border-radius: 15px;
                border: 1px solid rgba(62, 7, 3, 0.1);
            }
            
            .user-avatar {
                width: 45px;
                height: 45px;
                background: linear-gradient(135deg, #3E0703, #5A0A05);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: 600;
            }
            
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }
            
            .stat-card {
                background: white;
                border: 2px solid rgba(62, 7, 3, 0.1);
                border-radius: 18px;
                padding: 2rem;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
                cursor: pointer;
            }
            
            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(62, 7, 3, 0.15);
                border-color: #3E0703;
            }
            
            .stat-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #3E0703, #5A0A05);
            }
            
            .stat-icon {
                width: 55px;
                height: 55px;
                background: rgba(62, 7, 3, 0.1);
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
                font-weight: 800;
                color: #3E0703;
                margin-bottom: 0.5rem;
                line-height: 1;
            }
            
            .stat-label {
                font-size: 1rem;
                color: rgba(62, 7, 3, 0.7);
                font-weight: 500;
            }
            
            .stat-change {
                position: absolute;
                top: 1.5rem;
                right: 1.5rem;
                font-size: 0.8rem;
                padding: 0.3rem 0.8rem;
                border-radius: 20px;
                font-weight: 600;
            }
            
            .positive {
                background: rgba(34, 197, 94, 0.1);
                color: #16a34a;
            }
            
            .neutral {
                background: rgba(62, 7, 3, 0.1);
                color: #3E0703;
            }
            
            .content-grid {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 2rem;
                margin-bottom: 2rem;
            }
            
            .chart-section, .activity-section {
                background: white;
                border: 2px solid rgba(62, 7, 3, 0.1);
                border-radius: 18px;
                padding: 2rem;
                position: relative;
            }
            
            .chart-section::before, .activity-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #3E0703, #5A0A05);
                border-radius: 18px 18px 0 0;
            }
            
            .section-title {
                font-size: 1.3rem;
                font-weight: 700;
                color: #3E0703;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.8rem;
            }
            
            .chart-container {
                height: 300px;
                position: relative;
            }
            
            .activity-item {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem;
                border-radius: 12px;
                margin-bottom: 1rem;
                background: rgba(62, 7, 3, 0.03);
                border: 1px solid rgba(62, 7, 3, 0.05);
                transition: all 0.2s ease;
            }
            
            .activity-item:hover {
                background: rgba(62, 7, 3, 0.08);
                border-color: rgba(62, 7, 3, 0.2);
            }
            
            .activity-icon {
                width: 40px;
                height: 40px;
                background: rgba(62, 7, 3, 0.1);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .activity-info h4 {
                font-size: 0.95rem;
                font-weight: 600;
                color: #3E0703;
                margin-bottom: 0.2rem;
            }
            
            .activity-info p {
                font-size: 0.8rem;
                color: rgba(62, 7, 3, 0.6);
            }
            
            .quick-actions {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }
            
            .action-btn {
                background: linear-gradient(135deg, #3E0703, #5A0A05);
                color: white;
                border: none;
                border-radius: 12px;
                padding: 1rem 1.5rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 0.8rem;
                justify-content: center;
            }
            
            .action-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(62, 7, 3, 0.3);
            }
            
            .search-bar {
                position: relative;
                flex: 1;
                max-width: 400px;
            }
            
            .search-bar input {
                width: 100%;
                padding: 0.8rem 1rem 0.8rem 3rem;
                border: 2px solid rgba(62, 7, 3, 0.1);
                border-radius: 12px;
                font-size: 0.9rem;
                transition: all 0.2s ease;
            }
            
            .search-bar input:focus {
                outline: none;
                border-color: #3E0703;
                box-shadow: 0 0 0 3px rgba(62, 7, 3, 0.1);
            }
            
            .search-icon {
                position: absolute;
                left: 1rem;
                top: 50%;
                transform: translateY(-50%);
            }

            /* Ensure SVG icons inherit color */
            .search-icon svg,
            .activity-icon svg,
            .action-btn svg {
                color: #3E0703;
                display: block;
            }

            @media (max-width: 768px) {
                .dashboard-container {
                    margin: 0.5rem;
                    padding: 1rem;
                }
                
                .header {
                    flex-direction: column;
                    gap: 1rem;
                }
                
                .content-grid {
                    grid-template-columns: 1fr;
                }
                
                .stats-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <!-- Header -->
            <div class="header">
                <div class="logo-section">
                    <div class="logo">TCC</div>
                    <div class="college-info">
                        <h1>Tagoloan Community College</h1>
                        <p>Student Management System Dashboard</p>
                    </div>
                </div>
                <div class="search-bar">
                    <div class="search-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.7;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search students, courses, or records..." id="searchInput">
                </div>
                <div class="user-profile">
                    <div class="user-avatar">AD</div>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Admin</div>
                        <div style="font-size: 0.8rem; color: rgba(62, 7, 3, 0.6);">Administrator</div>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card" onclick="showDetails('students')">
                    <div class="stat-change positive">+12%</div>
                    <div class="stat-number" id="totalStudents">1,247</div>
                    <div class="stat-label">Total Students</div>
                </div>
                <div class="stat-card" onclick="showDetails('courses')">
                    <div class="stat-change positive">+5%</div>
                    <div class="stat-number" id="activeCourses">45</div>
                    <div class="stat-label">Active Courses</div>
                </div>
                <div class="stat-card" onclick="showDetails('faculty')">
                    <div class="stat-change neutral">+2</div>
                    <div class="stat-number" id="facultyCount">68</div>
                    <div class="stat-label">Faculty Members</div>
                </div>
                <div class="stat-card" onclick="showDetails('enrollment')">
                    <div class="stat-change positive">+8%</div>
                    <div class="stat-number" id="enrollmentRate">94.2%</div>
                    <div class="stat-label">Enrollment Rate</div>
                </div>
            </div>
            
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
            <!-- Quick Actions -->
            <div class="quick-actions">
                <button class="action-btn" onclick="addStudent()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity: 0.9; color: white;">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Add New Student</span>
                </button>
                <button class="action-btn" onclick="generateReport()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity: 0.9; color: white;">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                    <span>Generate Report</span>
                </button>
                <button class="action-btn" onclick="manageSchedule()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity: 0.9; color: white;">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Manage Schedule</span>
                </button>
                <button class="action-btn" onclick="viewGrades()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity: 0.9; color: white;">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5"></path>
                        <path d="M2 12l10 5 10-5"></path>
                    </svg>
                    <span>View Grades</span>
                </button>
            </div>
        <script>
            // Initialize Chart
            const ctx = document.getElementById('enrollmentChart').getContext('2d');
            const enrollmentChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                    datasets: [{
                        label: 'Student Enrollment',
                        data: [1100, 1150, 1180, 1200, 1220, 1235, 1240, 1247],
                        borderColor: '#3E0703',
                        backgroundColor: 'rgba(62, 7, 3, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#3E0703',
                        pointBorderColor: '#3E0703',
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 1000,
                            grid: {
                                color: 'rgba(62, 7, 3, 0.1)'
                            },
                            ticks: {
                                color: '#3E0703'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(62, 7, 3, 0.1)'
                            },
                            ticks: {
                                color: '#3E0703'
                            }
                        }
                    }
                }
            });

            // Animate numbers on load
            function animateNumber(elementId, finalNumber, duration = 2000) {
                const element = document.getElementById(elementId);
                const startNumber = 0;
                const increment = finalNumber / (duration / 16);
                let currentNumber = startNumber;
                
                const timer = setInterval(() => {
                    currentNumber += increment;
                    if (currentNumber >= finalNumber) {
                        element.textContent = finalNumber;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(currentNumber);
                    }
                }, 16);
            }

            // Initialize animations
            window.addEventListener('load', () => {
                animateNumber('totalStudents', 1247);
                animateNumber('activeCourses', 45);
                animateNumber('facultyCount', 68);
                setTimeout(() => {
                    document.getElementById('enrollmentRate').textContent = '94.2%';
                }, 1500);
            });

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                // Simulate search functionality
                if (searchTerm.length > 2) {
                    console.log('Searching for:', searchTerm);
                    // Add your search logic here
                }
            });

            // Interactive functions
            function showDetails(section) {
                switch(section) {
                    case 'students':
                        alert('Opening Student Details...\n• Total: 1,247 students\n• New this month: 35\n• Active: 1,205');
                        break;
                    case 'courses':
                        alert('Opening Course Details...\n• Active Courses: 45\n• New Courses: 3\n• Popular: Computer Science');
                        break;
                    case 'faculty':
                        alert('Opening Faculty Details...\n• Total Faculty: 68\n• Full-time: 52\n• Part-time: 16');
                        break;
                    case 'enrollment':
                        alert('Opening Enrollment Details...\n• Current Rate: 94.2%\n• Target: 95%\n• Trend: Increasing');
                        break;
                }
            }

            function addStudent() {
                const studentName = prompt('Enter student name:');
                if (studentName) {
                    // Simulate adding student
                    const activityList = document.getElementById('activityList');
                    const newActivity = document.createElement('div');
                    newActivity.className = 'activity-item';
                    newActivity.innerHTML = `
                        <div class="activity-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="activity-info">
                            <h4>Student Added Successfully</h4>
                            <p>${studentName} - Pending program assignment</p>
                        </div>
                    `;
                    activityList.insertBefore(newActivity, activityList.firstChild);
                    
                    // Update total count
                    const currentCount = parseInt(document.getElementById('totalStudents').textContent);
                    document.getElementById('totalStudents').textContent = currentCount + 1;
                }
            }

            function generateReport() {
                alert('Generating comprehensive student report...\n\nReport will include:\n• Student enrollment statistics\n• Course completion rates\n• Faculty performance\n• Financial summary\n\nReport will be ready in 30 seconds.');
            }

            function manageSchedule() {
                alert('Opening Schedule Management...\n\nFeatures:\n• View class schedules\n• Assign rooms\n• Manage time slots\n• Handle conflicts');
            }

            function viewGrades() {
                alert('Opening Grade Management...\n\nOptions:\n• View student grades\n• Generate transcripts\n• Grade statistics\n• Performance analytics');
            }

            // Add some dynamic activity updates
            setInterval(() => {
                const activities = [
                    { 
                        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>`,
                        title: 'Assignment Submitted', 
                        desc: 'John Doe - Mathematics Assignment' 
                    },
                    { 
                        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                    <path d="M2 17l10 5 10-5"></path>
                                    <path d="M2 12l10 5 10-5"></path>
                            </svg>`,
                        title: 'Student Graduated', 
                        desc: 'Jane Smith - Bachelor of Science' 
                    },
                    { 
                        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>`,
                        title: 'Message Sent', 
                        desc: 'Reminder about upcoming exams' 
                    },
                    { 
                        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="opacity: 0.65;">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>`,
                        title: 'Achievement Unlocked', 
                        desc: "Dean's List - 25 students" 
                    }
                ];
                
                const randomActivity = activities[Math.floor(Math.random() * activities.length)];
                const activityList = document.getElementById('activityList');
                
                if (activityList.children.length >= 6) {
                    activityList.removeChild(activityList.lastChild);
                }
                
                const newActivity = document.createElement('div');
                newActivity.className = 'activity-item';
                newActivity.innerHTML = `
                    <div class="activity-icon">${randomActivity.icon}</div>
                    <div class="activity-info">
                        <h4>${randomActivity.title}</h4>
                        <p>${randomActivity.desc}</p>
                    </div>
                `;
                
                activityList.insertBefore(newActivity, activityList.firstChild);
            }, 15000);
        </script>
    </body>
    </html>