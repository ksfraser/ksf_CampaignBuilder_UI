# ksf_CampaignBuilder_UI - Functional Requirements

## Document Information
- **Module**: ksf_CampaignBuilder_UI (Campaign Builder UI Adapter)
- **Version**: 1.0.0
- **Date**: 2026-05-13
- **Status**: Implemented
- **Author**: KSFII Development Team

---

## 1. Overview

### 1.1 Purpose
This document defines the functional requirements for the ksf_CampaignBuilder_UI module, which provides the user interface for campaign building functionality.

### 1.2 Scope
- Campaign list and management UI
- Campaign editor interface
- Audience selection UI
- Automation builder interface
- Analytics dashboard display

---

## 2. UI Components

### 2.1 Campaign List (FR-UI-LIST-001)
**Requirement**: The system shall display a list of campaigns.

**Features**:
- Table view of campaigns
- Columns: Name, Type, Status, Start Date, End Date, Actions
- Pagination (20 per page)
- Search/filter capability
- Sort by column

**Priority**: High

### 2.2 Campaign Actions (FR-UI-ACTION-001)
**Requirement**: The system shall provide campaign actions.

**Actions**:
- Create New Campaign
- Edit Campaign
- Delete Campaign
- Duplicate Campaign
- View Analytics
- Change Status

**Priority**: High

### 2.3 Campaign Editor (FR-UI-EDIT-001)
**Requirement**: The system shall provide campaign editing interface.

**Fields**:
- Campaign Name (text, required)
- Campaign Type (select: email, sms, multi-channel)
- Description (textarea)
- Status (select: draft, active, paused, completed)
- Start Date (date picker)
- End Date (date picker)
- Budget (currency input)
- Tags (multi-select)

**Priority**: High

### 2.4 Audience Selector (FR-UI-AUDIENCE-001)
**Requirement**: The system shall provide audience selection UI.

**Features**:
- Display available segments
- Show segment statistics (size, demographics)
- Multi-select segments
- Preview estimated reach
- Save audience selection

**Priority**: High

### 2.5 Automation Builder (FR-UI-AUTO-001)
**Requirement**: The system shall provide automation workflow builder.

**Components**:
- Canvas area for workflow
- Draggable action nodes
- Condition branches
- Delay nodes
- Action configuration panel

**Node Types**:
| Type | Description |
|------|-------------|
| Trigger | Start of workflow |
| Action | Email send, SMS, etc. |
| Condition | If/then branches |
| Delay | Wait period |
| End | Workflow termination |

**Priority**: High

### 2.6 Analytics Dashboard (FR-UI-ANALYTICS-001)
**Requirement**: The system shall display campaign analytics.

**Metrics**:
- Total Sent
- Delivered
- Open Rate
- Click Rate
- Conversion Rate
- Revenue (if applicable)

**Visualizations**:
- Line chart (trends)
- Bar chart (comparisons)
- Pie chart (breakdown)

**Priority**: Medium

---

## 3. Page Requirements

### 3.1 campaigns.php
Main campaigns listing page.

**Route**: `/modules/ksf_CampaignBuilder_UI/pages/campaigns.php`

**Security**: `CRM_CAMPAIGN_VIEW`

**Components**:
- Header with "Campaigns" title
- Action bar (Create button, filters)
- Campaigns table
- Pagination controls

### 3.2 campaign-edit.php (Future)
Campaign editor page.

**Route**: `/modules/ksf_CampaignBuilder_UI/pages/campaign-edit.php?id={id}`

**Security**: `CRM_CAMPAIGN_EDIT`

**Components**:
- Campaign details form
- Tabbed interface (Details, Audience, Automation, Settings)
- Save/Cancel buttons

### 3.3 campaign-analytics.php (Future)
Analytics dashboard page.

**Route**: `/modules/ksf_CampaignBuilder_UI/pages/campaign-analytics.php?id={id}`

**Security**: `CRM_CAMPAIGN_VIEW`

**Components**:
- Summary cards
- Charts
- Detailed breakdown tables
- Export buttons

---

## 4. Form Elements

### 4.1 Input Types
| Type | Implementation | Validation |
|------|---------------|------------|
| Text | `<input type="text">` | Required, max length |
| Number | `<input type="number">` | Min/max, integer |
| Date | `<input type="date">` | Valid date format |
| Select | `<select>` | Required selection |
| Checkbox | `<input type="checkbox">` | Boolean |
| Textarea | `<textarea>` | Max length |
| Currency | `<input type="number">` | Decimal, min 0 |

### 4.2 UI Components
| Component | Bootstrap Class | Purpose |
|-----------|-----------------|---------|
| Card | `.card` | Section container |
| Form Group | `.mb-3` | Input grouping |
| Button Primary | `.btn.btn-primary` | Main actions |
| Button Secondary | `.btn.btn-secondary` | Cancel/back |
| Alert | `.alert.alert-*` | Messages |
| Badge | `.badge` | Status indicators |
| Table | `.table.table-striped` | Data display |

---

## 5. JavaScript Requirements

### 5.1 Core Functions
| Function | Purpose |
|----------|---------|
| loadCampaigns() | Fetch and display campaign list |
| saveCampaign(data) | Submit campaign form |
| deleteCampaign(id) | Remove campaign |
| loadAnalytics(id) | Fetch analytics data |

### 5.2 UI Interactions
| Interaction | Handler |
|-------------|---------|
| Table row click | Open campaign edit |
| Filter change | Reload list |
| Pagination click | Load next page |
| Modal open | Initialize form |

### 5.3 AJAX Patterns
```javascript
const CampaignAPI = {
    list: (params) => $.getJSON(apiUrl, params),
    get: (id) => $.getJSON(`${apiUrl}/${id}`),
    save: (data) => $.post(apiUrl, data),
    delete: (id) => $.ajax({ url: `${apiUrl}/${id}`, method: 'DELETE' })
};
```

---

## 6. Error Handling

### 6.1 Form Validation
- Client-side validation with HTML5
- Server-side validation echo
- Error message display per field

### 6.2 AJAX Errors
```javascript
$.ajax({
    error: (xhr, status, error) => {
        showAlert('error', 'An error occurred: ' + error);
    }
});
```

### 6.3 Empty States
- No campaigns: "No campaigns yet. Create your first campaign."
- No results: "No campaigns match your filters."
- Loading: Spinner or skeleton

---

## 7. Accessibility

### 7.1 Requirements
- Semantic HTML
- ARIA labels on interactive elements
- Keyboard navigation
- Color contrast compliance
- Focus indicators

### 7.2 Examples
```html
<button aria-label="Edit campaign" class="btn btn-sm">
    <i aria-hidden="true" class="fa fa-edit"></i>
</button>

<table role="grid">
    <thead>
        <tr>
            <th scope="col" aria-sort="ascending">Name</th>
        </tr>
    </thead>
</table>
```

---

## 8. Responsive Design

### 8.1 Breakpoints
| Breakpoint | Width | Layout |
|------------|-------|--------|
| Mobile | < 576px | Single column |
| Tablet | 576-768px | Compact table |
| Desktop | > 768px | Full layout |

### 8.2 Mobile Adaptations
- Collapsible table columns
- Stack forms vertically
- Hamburger menu for filters
- Touch-friendly buttons (min 44px)

---

*Document Version: 1.0.0*
*Last Updated: 2026-05-13*