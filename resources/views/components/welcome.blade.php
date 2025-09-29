<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagoloan Community College - Student Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #0f172a;
            --light: #f8fafc;
            --gray: #94a3b8;
            --light-gray: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
            color: var(--secondary);
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-gray);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .college-name h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--secondary);
        }

        .college-name p {
            color: var(--gray);
            font-size: 14px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .user-details {
            text-align: right;
        }

        .user-details span {
            display: block;
            font-size: 14px;
            color: var(--gray);
        }

        .user-details strong {
            font-size: 16px;
            color: var(--secondary);
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .students-icon {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--primary);
        }

        .courses-icon {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .enrollment-icon {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .graduates-icon {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--gray);
            font-size: 14px;
        }

        /* Main Content */
        .dashboard-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .content-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--light-gray);
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
            color: var(--secondary);
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Recent Students Table */
        .students-table {
            width: 100%;
            border-collapse: collapse;
        }

        .students-table th {
            text-align: left;
            padding: 12px 16px;
            font-weight: 600;
            color: var(--gray);
            font-size: 14px;
            border-bottom: 1px solid var(--light-gray);
        }

        .students-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--light-gray);
            font-size: 14px;
        }

        .students-table tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            font-weight: 600;
            color: var(--secondary);
        }

        .student-id {
            color: var(--gray);
            font-size: 13px;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.15);
            color: var(--warning);
        }

        /* Recent Activities */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--light-gray);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-icon i {
            font-size: 16px;
        }

        .icon-enrollment {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--primary);
        }

        .icon-payment {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .icon-document {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .activity-details {
            flex: 1;
        }

        .activity-text {
            margin-bottom: 4px;
            font-size: 14px;
        }

        .activity-time {
            color: var(--gray);
            font-size: 12px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .dashboard-content {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .user-info {
                align-self: flex-end;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="logo-container">
                <div class="logo">TCC</div>
                <div class="college-name">
                    <h1>Tagoloan Community College</h1>
                    <p>Student Management System</p>
                </div>
            </div>
            <div class="user-info">
                <div class="user-avatar">AD</div>
                <div class="user-details">
                    <strong>Admin User</strong>
                    <span>Administrator</span>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">1,248</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-icon students-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">42</div>
                        <div class="stat-label">Active Courses</div>
                    </div>
                    <div class="stat-icon courses-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">86</div>
                        <div class="stat-label">New Enrollments</div>
                    </div>
                    <div class="stat-icon enrollment-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">312</div>
                        <div class="stat-label">Graduates</div>
                    </div>
                    <div class="stat-icon graduates-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <!-- Recent Students -->
            <div class="content-card">
                <div class="card-header">
                    <h2>Recent Students</h2>
                    <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>ID Number</th>
                            <th>Course</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="student-name">Maria Santos</div>
                                <div class="student-id">TCC-2023-001</div>
                            </td>
                            <td>TCC-2023-001</td>
                            <td>Bachelor of Science in Information Technology</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-name">Juan Dela Cruz</div>
                                <div class="student-id">TCC-2023-002</div>
                            </td>
                            <td>TCC-2023-002</td>
                            <td>Bachelor of Elementary Education</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-name">Ana Reyes</div>
                                <div class="student-id">TCC-2023-003</div>
                            </td>
                            <td>TCC-2023-003</td>
                            <td>Bachelor of Science in Nursing</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-name">Pedro Garcia</div>
                                <div class="student-id">TCC-2023-004</div>
                            </td>
                            <td>TCC-2023-004</td>
                            <td>Bachelor of Science in Accountancy</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-name">Luisa Mendoza</div>
                                <div class="student-id">TCC-2023-005</div>
                            </td>
                            <td>TCC-2023-005</td>
                            <td>Bachelor of Science in Computer Science</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Recent Activities -->
            <div class="content-card">
                <div class="card-header">
                    <h2>Recent Activities</h2>
                    <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon icon-enrollment">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">New student enrollment: Maria Santos</div>
                            <div class="activity-time">Today, 10:30 AM</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon icon-payment">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">Tuition payment received from Juan Dela Cruz</div>
                            <div class="activity-time">Yesterday, 2:15 PM</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon icon-document">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">Document submission: Ana Reyes</div>
                            <div class="activity-time">Yesterday, 11:45 AM</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon icon-enrollment">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">New student enrollment: Pedro Garcia</div>
                            <div class="activity-time">Jun 15, 2023</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon icon-payment">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-text">Tuition payment received from Luisa Mendoza</div>
                            <div class="activity-time">Jun 14, 2023</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>