# ksf_CampaignBuilder_UI - Architecture

## Document Information
- **Module**: ksf_CampaignBuilder_UI (Campaign Builder UI Adapter)
- **Version**: 1.0.0
- **Date**: 2026-05-13
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Architecture Overview

### 1.1 Design Principles
The ksf_CampaignBuilder_UI module follows these architectural principles:

1. **Adapter Pattern**: UI adapter consuming business logic from ksf_CampaignBuilder
2. **Separation of Concerns**: UI separate from business logic
3. **Modular Components**: Reusable UI components
4. **Thin Controller Pattern**: Controllers delegate to services

### 1.2 Architecture Type
This is a **Frontend Adapter Module** - it provides the UI layer while delegating business logic to the core ksf_CampaignBuilder module.

---

## 2. Directory Structure

```
ksf_CampaignBuilder_UI/
├── README.md
├── pages/
│   └── campaigns.php           # Main campaigns page
├── ProjectDcs/
│   ├── Business Requirements.md
│   ├── Architecture.md
│   ├── Functional Requirements.md
│   ├── Use Case.md
│   ├── Test Plan.md
│   ├── UAT Plan.md
│   └── RTM.md                  # Requirements Traceability Matrix
└── js/                         # JavaScript assets (future)
    ├── campaign-editor.js
    └── automation-builder.js
```

---

## 3. Module Components

### 3.1 pages/campaigns.php
Main campaigns listing and management page.

**Features**:
- Campaign list display
- Quick actions (edit, delete, duplicate)
- Status filters
- Pagination
- Create new campaign button

**Integration**:
- Uses Bootstrap 5 for styling
- Calls ksf_CampaignBuilder services via AJAX or direct includes
- FA-compatible page structure

### 3.2 Future Components (Planned)

#### Campaign Editor Page
```
pages/campaign-edit.php
```
- Campaign detail form
- Audience selection
- Automation builder
- Preview mode

#### Analytics Dashboard
```
pages/campaign-analytics.php
```
- Performance charts
- Statistics cards
- Export functionality

---

## 4. UI Design Patterns

### 4.1 Page Structure
```php
// FA-compatible page structure
$page_security = 'CRM_CAMPAIGN_VIEW';
$path_to_root = "../../../";
include_once($path_to_root . "includes/session.inc");

page_header("Campaigns");

// Page content
display_campaigns_table($campaigns);

end_page();
```

### 4.2 Bootstrap Integration
```html
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Campaigns</h5>
    </div>
    <div class="card-body">
        <!-- Content -->
    </div>
</div>
```

### 4.3 AJAX Patterns
```javascript
// API call to ksf_CampaignBuilder
$.ajax({
    url: '../api/campaigns',
    method: 'POST',
    data: { action: 'create', ... }
});
```

---

## 5. Integration with ksf_CampaignBuilder

### 5.1 Dependency Flow
```
ksf_CampaignBuilder_UI (this module)
    |
    +-- Consumes --> ksf_CampaignBuilder (business logic)
    |                   |
    |                   +-- Entities
    |                   +-- Services
    |                   +-- Repositories
    |
    +-- Runs on --> FrontAccounting (framework)
```

### 5.2 Service Consumption
```php
// Include core module
require_once __DIR__ . '/../../ksf_CampaignBuilder/src/Ksfraser/CampaignBuilder/Service/CampaignService.php';

// Use campaign services
$campaignService = new CampaignService($db, ...);
$campaigs = $campaignService->getCampaigns();
```

---

## 6. Extension Points

### 6.1 Custom Campaign Types
```php
// hooks.php or init.php
add_hook('campaign_type_ui', function($type) {
    // Add custom campaign type UI
});
```

### 6.2 Custom Action Types
```javascript
// automation-builder.js
window.CampaignBuilderActions = {
    ...existing_actions,
    custom_action: CustomActionHandler
};
```

### 6.3 Custom Analytics Widgets
```php
// In analytics page
do_hook('campaign_analytics_widget', ['position' => 'sidebar']);
```

---

## 7. Security Considerations

### 7.1 Access Control
- Page-level security via `$page_security`
- Action-level validation in controllers
- CSRF protection on forms

### 7.2 Input Sanitization
- HTML escaping on output
- Parameterized queries (via core module)
- File upload validation (future)

---

## 8. Testing Architecture

### 8.1 Unit Tests (Future)
- UI component rendering tests
- Form validation tests
- JavaScript unit tests

### 8.2 Integration Tests
- Page load tests
- Form submission tests
- AJAX endpoint tests

### 8.3 E2E Tests (Future)
- Campaign creation flow
- Automation builder usage
- Analytics display verification

---

## 9. Deployment

### 9.1 Installation
1. Install ksf_CampaignBuilder first
2. Copy ksf_CampaignBuilder_UI to FA modules
3. Activate via FA module manager
4. Permissions assigned to roles

### 9.2 Upgrade Path
- Preserve customizations in local files
- Update UI module separately from core
- Test UI against new core versions

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-13*