# ksf_CampaignBuilder_UI - Test Plan

## Document Information
- **Module**: ksf_CampaignBuilder_UI (Campaign Builder UI Adapter)
- **Version**: 1.0.0
- **Date**: 2026-05-13
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Introduction

### 1.1 Purpose
This test plan defines the testing strategy for the ksf_CampaignBuilder_UI module, ensuring all UI components function correctly and integrate properly with ksf_CampaignBuilder.

### 1.2 Scope
- Page rendering tests
- Form validation tests
- UI component tests
- Integration tests with core module

### 1.3 Test Environment
- **PHP**: 8.0+
- **Browser**: Chrome, Firefox, Safari, Edge
- **Testing Framework**: PHPUnit, Selenium (future)
- **Frontend**: Jest (future)

---

## 2. Testing Strategy

### 2.1 Test Levels

| Level | Description | Target |
|-------|-------------|--------|
| Unit | JavaScript component tests | 80% |
| Integration | Page load and form tests | 100% |
| E2E | Full workflow tests | Critical paths |

### 2.2 Test Types

| Type | Description |
|------|-------------|
| Functional | UI features work as specified |
| Regression | No existing features broken |
| Cross-browser | Consistent behavior |
| Accessibility | WCAG compliance |

---

## 3. Test Cases

### 3.1 Page Rendering (TC-PAGE)

#### TC-PAGE-001: Campaigns Page Loads
**Preconditions**: FA installed, module enabled  
**Test Steps**:
1. Navigate to campaigns.php
2. Verify page loads without errors
3. Verify page title correct

**Expected Result**: Page loads successfully

**Priority**: High

---

#### TC-PAGE-002: Empty State Display
**Preconditions**: No campaigns exist  
**Test Steps**:
1. Navigate to campaigns page
2. Observe empty state

**Expected Result**: "No campaigns" message shown

**Priority**: Medium

---

#### TC-PAGE-003: Campaign Table Headers
**Preconditions**: None  
**Test Steps**:
1. Load campaigns page
2. Inspect table headers

**Expected Result**: Headers match spec (Name, Status, Dates, Actions)

**Priority**: Medium

---

### 3.2 Form Validation (TC-FORM)

#### TC-FORM-001: Required Field Validation
**Preconditions**: Campaign editor open  
**Test Steps**:
1. Leave name field empty
2. Click Save
3. Observe validation error

**Expected Result**: Error message shown

**Priority**: High

---

#### TC-FORM-002: Date Validation
**Preconditions**: Campaign editor open  
**Test Steps**:
1. Set end date before start date
2. Click Save

**Expected Result**: Validation error

**Priority**: High

---

#### TC-FORM-003: Max Length Validation
**Preconditions**: Campaign editor open  
**Test Steps**:
1. Enter text > 255 chars in name
2. Observe truncation or error

**Expected Result**: Error or truncation

**Priority**: Low

---

### 3.3 User Interactions (TC-UI)

#### TC-UI-001: Create Button Visible
**Preconditions**: Campaigns page loaded  
**Test Steps**:
1. Look for Create button
2. Verify button present and visible

**Expected Result**: Button visible

**Priority**: High

---

#### TC-UI-002: Edit Button Click
**Preconditions**: Campaigns exist  
**Test Steps**:
1. Click edit icon on row
2. Verify editor opens

**Expected Result**: Editor page loads

**Priority**: High

---

#### TC-UI-003: Delete Confirmation
**Preconditions**: Campaign exists  
**Test Steps**:
1. Click delete icon
2. Verify confirmation dialog

**Expected Result**: Dialog shown

**Priority**: High

---

#### TC-UI-004: Search Functionality
**Preconditions**: Multiple campaigns  
**Test Steps**:
1. Type in search box
2. Observe filtered results

**Expected Result**: List filters

**Priority**: Medium

---

### 3.4 Component Tests (TC-COMP)

#### TC-COMP-001: Bootstrap Cards Render
**Preconditions**: None  
**Test Steps**:
1. Load any page
2. Inspect card components

**Expected Result**: Cards styled correctly

**Priority**: Medium

---

#### TC-COMP-002: Form Controls Styled
**Preconditions**: Editor open  
**Test Steps**:
1. Inspect form inputs
2. Verify Bootstrap styling

**Expected Result**: Consistent styling

**Priority**: Low

---

### 3.5 Integration Tests (TC-INT)

#### TC-INT-001: Data Loads from Core Module
**Preconditions**: Core module installed, data exists  
**Test Steps**:
1. Load campaigns page
2. Verify campaigns from database displayed

**Expected Result**: Data from ksf_CampaignBuilder shown

**Priority**: High

---

#### TC-INT-002: Create Campaign via Core
**Preconditions**: Editor open  
**Test Steps**:
1. Fill form
2. Submit
3. Verify in database via core module

**Expected Result**: Campaign created via ksf_CampaignBuilder

**Priority**: High

---

### 3.6 Cross-Browser Tests (TC-BROWSER)

#### TC-BROWSER-001: Chrome Compatibility
**Preconditions**: Chrome latest  
**Test Steps**:
1. Run all UI tests on Chrome

**Expected Result**: All pass

**Priority**: High

---

#### TC-BROWSER-002: Firefox Compatibility
**Preconditions**: Firefox latest  
**Test Steps**:
1. Run all UI tests on Firefox

**Expected Result**: All pass

**Priority**: High

---

#### TC-BROWSER-003: Mobile Responsiveness
**Preconditions**: Device or responsive mode  
**Test Steps**:
1. View campaigns page on mobile
2. Verify layout adapts

**Expected Result**: Mobile-friendly layout

**Priority**: Medium

---

### 3.7 Accessibility Tests (TC-A11Y)

#### TC-A11Y-001: Keyboard Navigation
**Preconditions**: None  
**Test Steps**:
1. Tab through page
2. Verify focus indicators

**Expected Result**: All elements focusable

**Priority**: Medium

---

#### TC-A11Y-002: ARIA Labels
**Preconditions**: None  
**Test Steps**:
1. Inspect icon-only buttons
2. Verify aria-label present

**Expected Result**: Screen reader accessible

**Priority**: Medium

---

## 4. Test Data

### 4.1 Sample Campaigns
```php
$campaigns = [
    [
        'id' => 1,
        'name' => 'Summer Sale 2026',
        'type' => 'email',
        'status' => 'active',
        'start_date' => '2026-06-01',
        'end_date' => '2026-08-31',
    ],
    [
        'id' => 2,
        'name' => 'Product Launch',
        'type' => 'multi-channel',
        'status' => 'draft',
        'start_date' => '2026-07-15',
        'end_date' => '2026-07-30',
    ],
];
```

---

## 5. Test Execution

### 5.1 Manual Testing
```bash
# Open in browser
http://localhost/fa/modules/ksf_CampaignBuilder_UI/pages/campaigns.php
```

### 5.2 Automated Testing (Future)
```bash
# Run PHPUnit
./vendor/bin/phpunit

# Run JS tests (Jest)
npm test

# E2E tests (Cypress)
npx cypress run
```

---

## 6. Risk Assessment

| Risk | Likelihood | Impact | Mitigation |
|------|------------|--------|------------|
| Core module dependency | High | High | Install order enforcement |
| CSS conflicts | Medium | Medium | Namespaced styles |
| Browser differences | Medium | Low | Cross-browser testing |

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-13*