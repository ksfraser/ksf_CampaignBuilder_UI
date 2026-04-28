<?php
$page_security = 'SA_CAMPAIGN'; $path_to_root = "../../..";
include_once($path_to_root . "/includes/session.inc");
include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/modules/FA_CampaignBuilder/includes/campaign_db.inc");
page(_("Campaigns"), false, false, "", "");
$campaigns = get_campaigns();
start_table(TABLESTYLE);
table_header([_('Name'), _('Status'), _('Action')]);
while ($c = db_fetch($campaigns)) { alt_table_row($c); label_cell($c['name']); label_cell($c['status']); echo "<td><a href='?edit=".$c['id']."'>"._("Edit")."</a></td>"; }
end_table(1); end_page(true);