# ksf_CampaignBuilder_UI - UAT Plan

## Document Information
- **Module**: ksf_CampaignBuilder_UI (Campaign Builder UI Adapter)
- **Version**: 1.0.0
- **Date**: 2026-05-13
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Introduction

### 1.1 Purpose
This UAT Plan defines user acceptance tests for the ksf_CampaignBuilder_UI module from an end-user perspective.

### 1.2 Scope
- Campaign list display
- Campaign creation and editing
- Audience selection UI
- Automation builder interface
- Analytics dashboard

### 1.3 Test Environment
- **Browser**: Chrome/Firefox latest
- **Frontend**: Bootstrap 5
- **Backend**: FA with ksf_CampaignBuilder

### 1.4 Stakeholders
- Marketing Managers
- Campaign Analysts
- Administrators

---

## 2. UAT Test Cases

### 2.1 Campaign List (UAT-LIST)

#### UAT-LIST-001: View Campaign List
**Objective**: Verify campaign list displays correctly

**Test Scenario**:
1. Navigate to Campaigns page
2. View list of campaigns

**Expected Result**: Campaigns displayed in table

**Acceptance Criteria**:
- [ ] Table renders with columns
- [ ] Campaigns from database shown
- [ ] Pagination if > 20 campaigns
- [ ] Create button visible

---

#### UAT-LIST-002: Search Campaigns
**Objective**: Verify search functionality

**Test Scenario**:
1. Type campaign name in search
2. Observe filtered results

**Expected Result**: Matching campaigns shown

**Acceptance Criteria**:
- [ ] Search input present
- [ ] Results filter as typed
- [ ] Clear search works

---

#### UAT-LIST-003: Filter by Status
**Objective**: Verify status filter

**Test Scenario**:
1. Select status dropdown
2. Choose "Active"
3. View filtered list

**Expected Result**: Only active campaigns shown

**Acceptance Criteria**:
- [ ] Dropdown present
- [ ] Filter applies correctly
- [ ] Multiple statuses work

---

### 2.2 Campaign Creation (UAT-CREATE)

#### UAT-CREATE-001: Create New Campaign
**Objective**: Verify campaign creation works

**Test Scenario**:
1. Click "Create Campaign"
2. Fill form:
   - Name: "Test Campaign"
   - Type: Email
   - Start: Tomorrow
3. Click Save

**Expected Result**: Campaign created, redirected to list

**Acceptance Criteria**:
- [ ] Create button works
- [ ] Form displays correctly
- [ ] Validation works
- [ ] Save creates campaign

---

#### UAT-CREATE-002: Form Validation
**Objective**: Verify required fields enforced

**Test Scenario**:
1. Click Create Campaign
2. Leave name empty
3. Click Save

**Expected Result**: Error message shown

**Acceptance Criteria**:
- [ ] Required indicator shown
- [ ] Error message clear
- [ ] Cannot submit empty form

---

#### UAT-CREATE-003: Cancel Campaign Creation
**Objective**: Verify cancel works

**Test Scenario**:
1. Click Create Campaign
2. Fill some fields
3. Click Cancel

**Expected Result**: Return to list, no changes

**Acceptance Criteria**:
- [ ] Cancel button present
- [ ] Return to list
- [ ] No campaign created

---

### 2.3 Campaign Editing (UAT-EDIT)

#### UAT-EDIT-001: Edit Campaign
**Objective**: Verify edit works

**Test Scenario**:
1. Click edit on existing campaign
2. Change name
3. Save

**Expected Result**: Campaign updated

**Acceptance Criteria**:
- [ ] Editor opens with data
- [ ] Changes save correctly
- [ ] List reflects change

---

#### UAT-EDIT-002: Delete Campaign
**Objective**: Verify delete works

**Test Scenario**:
1. Click delete on campaign
2. Confirm deletion

**Expected Result**: Campaign removed

**Acceptance Criteria**:
- [ ] Confirmation dialog appears
- [ ] Campaign removed from list
- [ ] Undo available (if applicable)

---

### 2.4 Audience Selection (UAT-AUDIENCE)

#### UAT-AUDIENCE-001: Select Segments
**Objective**: Verify segment selection

**Test Scenario**:
1. Open campaign editor
2. Click Audience tab
3. Select segments
4. Save

**Expected Result**: Segments saved

**Acceptance Criteria**:
- [ ] Segments list shown
- [ ] Selection works
- [ ] Reach estimate updates
- [ ] Saves correctly

---

### 2.5 Automation Builder (UAT-AUTO)

#### UAT-AUTO-001: View Automation Canvas
**Objective**: Verify automation tab works

**Test Scenario**:
1. Open campaign editor
2. Click Automation tab

**Expected Result**: Canvas displayed

**Acceptance Criteria**:
- [ ] Canvas renders
- [ ] Node palette shown
- [ ] Ready for building

---

#### UAT-AUTO-002: Add Action Node
**Objective**: Verify node addition

**Test Scenario**:
1. In Automation tab
2. Drag email action to canvas
3. Configure action

**Expected Result**: Node added

**Acceptance Criteria**:
- [ ] Drag works
- [ ] Node appears
- [ ] Configuration panel opens

---

### 2.6 Analytics (UAT-ANALYTICS)

#### UAT-ANALYTICS-001: View Analytics Dashboard
**Objective**: Verify analytics display

**Test Scenario**:
1. Click analytics icon on campaign
2. View dashboard

**Expected Result**: Metrics displayed

**Acceptance Criteria**:
- [ ] Dashboard loads
- [ ] Metrics cards show
- [ ] Charts render

---

#### UAT-ANALYTICS-002: Export Report
**Objective**: Verify export works

**Test Scenario**:
1. On analytics page
2. Click Export
3. Select format

**Expected Result**: Report downloaded

**Acceptance Criteria**:
- [ ] Export button works
- [ ] Format selection present
- [ ] File downloads

---

## 3. Sign-Off Criteria

### 3.1 Test Completion Metrics
- **Total UAT Test Cases**: 12
- **Passed**: [ ]
- **Failed**: [ ]
- **Pass Rate**: [ ]%

### 3.2 Critical Path Tests (Must Pass)
- [ ] View campaign list
- [ ] Create campaign
- [ ] Edit campaign
- [ ] Delete campaign

### 3.3 Sign-Off Table
| Test Area | Tester | Date | Result |
|-----------|--------|------|--------|
| Campaign List | | | Pass/Fail |
| Campaign Creation | | | Pass/Fail |
| Campaign Editing | | | Pass/Fail |
| Audience Selection | | | Pass/Fail |
| Automation Builder | | | Pass/Fail |
| Analytics | | | Pass/Fail |

---

## 4. Success Criteria

### 4.1 Go/No-Go Decision
Module passes UAT when:
1. 100% critical test cases pass
2. 90% overall test cases pass
3. No Critical defects open
4. Business sign-off obtained

### 4.2 Issue Resolution
| Severity | Resolution |
|----------|------------|
| Critical | Must fix before release |
| High | Should fix before release |
| Medium | Release OK with known issues |
| Low | Can defer |

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-13*