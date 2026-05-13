# ksf_CampaignBuilder_UI - Use Case

## Document Information
- **Module**: ksf_CampaignBuilder_UI (Campaign Builder UI Adapter)
- **Version**: 1.0.0
- **Date**: 2026-05-13
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Use Case Overview

### 1.1 Actors
| Actor | Description |
|-------|-------------|
| Marketing Manager | Creates and manages campaigns |
| Campaign Analyst | Views analytics and reports |
| Admin | Configures system settings |

### 1.2 Use Case Categories
- Campaign Management
- Audience Selection
- Automation Building
- Analytics Viewing

---

## 2. Campaign Management Use Cases

### UC-CAMP-001: View Campaign List

**Actor**: Marketing Manager  
**Trigger**: User navigates to campaigns page

**Pre-conditions**:
- User authenticated
- User has campaign view permission

**Steps**:
1. User navigates to /modules/ksf_CampaignBuilder_UI/pages/campaigns.php
2. System displays campaign list
3. System shows pagination if > 20 campaigns
4. User can scroll through list

**Post-conditions**:
- Campaign list displayed
- User can interact with campaigns

---

### UC-CAMP-002: Create New Campaign

**Actor**: Marketing Manager  
**Trigger**: User clicks "Create Campaign" button

**Pre-conditions**:
- User has create permission

**Steps**:
1. User clicks "New Campaign" button
2. System opens campaign editor
3. User fills required fields:
   - Name
   - Type
   - Start Date
4. User optionally fills:
   - Description
   - End Date
   - Budget
5. User clicks Save
6. System validates input
7. System creates campaign via ksf_CampaignBuilder
8. System redirects to campaign list

**Post-conditions**:
- Campaign created in database
- Campaign appears in list

---

### UC-CAMP-003: Edit Campaign

**Actor**: Marketing Manager  
**Trigger**: User clicks edit on campaign

**Pre-conditions**:
- Campaign exists
- User has edit permission

**Steps**:
1. User clicks edit icon on campaign row
2. System opens campaign editor with data
3. User modifies fields
4. User clicks Save
5. System validates and updates
6. System redirects to campaign list

**Post-conditions**:
- Campaign updated
- Changes reflected in list

---

### UC-CAMP-004: Delete Campaign

**Actor**: Marketing Manager  
**Trigger**: User clicks delete on campaign

**Pre-conditions**:
- Campaign exists
- User has delete permission

**Steps**:
1. User clicks delete icon
2. System shows confirmation dialog
3. User confirms deletion
4. System calls delete via ksf_CampaignBuilder
5. System removes from list

**Post-conditions**:
- Campaign marked inactive
- Removed from list display

---

### UC-CAMP-005: Search Campaigns

**Actor**: Marketing Manager  
**Trigger**: User enters search term

**Pre-conditions**: None

**Steps**:
1. User types in search box
2. System filters list as user types (debounced)
3. Matching campaigns displayed

**Post-conditions**:
- Filtered list displayed

---

### UC-CAMP-006: Filter by Status

**Actor**: Marketing Manager  
**Trigger**: User selects status filter

**Pre-conditions**: None

**Steps**:
1. User clicks status dropdown
2. User selects status (e.g., "Active")
3. System filters list
4. Only matching campaigns shown

**Post-conditions**:
- Filtered list displayed

---

## 3. Audience Selection Use Cases

### UC-AUDIENCE-001: Select Audience Segments

**Actor**: Marketing Manager  
**Trigger**: User opens audience selection in campaign editor

**Pre-conditions**:
- Campaign editor open
- Segments available

**Steps**:
1. User clicks "Select Audience" tab
2. System displays available segments
3. User checks desired segments
4. System shows estimated reach
5. User clicks Save
6. Audience saved to campaign

**Post-conditions**:
- Campaign linked to segments
- Estimated reach shown

---

### UC-AUDIENCE-002: View Segment Details

**Actor**: Marketing Manager  
**Trigger**: User hovers over segment name

**Pre-conditions**: Segments list visible

**Steps**:
1. User hovers over segment
2. System shows tooltip with stats
3. User sees segment size, description

**Post-conditions**:
- User informed about segment

---

## 4. Automation Builder Use Cases

### UC-AUTO-001: Create Automation Workflow

**Actor**: Marketing Manager  
**Trigger**: User opens automation tab

**Pre-conditions**:
- Campaign editor open
- Automation feature enabled

**Steps**:
1. User clicks "Automation" tab
2. System displays empty canvas
3. User drags trigger node to canvas
4. User drags action nodes
5. User connects nodes
6. User configures each node
7. User clicks Save
8. Workflow saved to campaign

**Post-conditions**:
- Workflow defined for campaign
- Visual representation stored

---

### UC-AUTO-002: Add Action Node

**Actor**: Marketing Manager  
**Trigger**: User drags action to canvas

**Pre-conditions**:
- Automation canvas open

**Steps**:
1. User drags action from sidebar
2. User drops on canvas
3. System shows configuration panel
4. User selects action type (email, SMS, etc.)
5. User configures action details
6. User saves configuration

**Post-conditions**:
- Action node added to workflow

---

### UC-AUTO-003: Add Condition Branch

**Actor**: Marketing Manager  
**Trigger**: User adds condition node

**Pre-conditions**:
- Automation canvas open

**Steps**:
1. User drags condition node
2. User configures condition:
   - Field (opened, clicked, etc.)
   - Operator (equals, contains, etc.)
   - Value
3. User connects branches:
   - Yes path
   - No path

**Post-conditions**:
- Condition logic defined

---

## 5. Analytics Use Cases

### UC-ANALYTICS-001: View Campaign Analytics

**Actor**: Campaign Analyst  
**Trigger**: User clicks analytics icon

**Pre-conditions**:
- Campaign exists
- User has view permission

**Steps**:
1. User clicks analytics icon on campaign
2. System loads analytics page
3. System fetches data from ksf_CampaignBuilder
4. System displays metrics cards
5. System renders charts

**Post-conditions**:
- Analytics displayed

---

### UC-ANALYTICS-002: Export Report

**Actor**: Campaign Analyst  
**Trigger**: User clicks export

**Pre-conditions**:
- Analytics page open

**Steps**:
1. User clicks Export button
2. User selects format (CSV, PDF)
3. System generates report
4. System downloads file

**Post-conditions**:
- Report file downloaded

---

## 6. Use Case Summary

| UC ID | Use Case | Actor | Priority |
|-------|----------|-------|----------|
| UC-CAMP-001 | View Campaign List | Marketing Manager | Critical |
| UC-CAMP-002 | Create Campaign | Marketing Manager | Critical |
| UC-CAMP-003 | Edit Campaign | Marketing Manager | High |
| UC-CAMP-004 | Delete Campaign | Marketing Manager | High |
| UC-CAMP-005 | Search Campaigns | Marketing Manager | Medium |
| UC-CAMP-006 | Filter by Status | Marketing Manager | Medium |
| UC-AUDIENCE-001 | Select Segments | Marketing Manager | High |
| UC-AUDIENCE-002 | View Segment Details | Marketing Manager | Low |
| UC-AUTO-001 | Create Workflow | Marketing Manager | High |
| UC-AUTO-002 | Add Action Node | Marketing Manager | High |
| UC-AUTO-003 | Add Condition | Marketing Manager | High |
| UC-ANALYTICS-001 | View Analytics | Analyst | High |
| UC-ANALYTICS-002 | Export Report | Analyst | Medium |

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-13*