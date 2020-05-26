INSERT INTO `label` (`label_id`, `label_name`) VALUES
(1, 'CUSTOMER'),
(2, 'HOT LEAD'),
(3, 'WARM LEAD'),
(4, 'COLD LEAD');

INSERT INTO `owner_visibility_group` (`id`, `owner_visibility_name`, `description`) VALUES
(1, 'Owner only', 'Only the owner,admins and users in the parent groups can see and edit the details '),
(2, 'Owner visibility group', 'Users in the same visibility group,admins and users in the parent groups can see and edit the details'),
(3, 'Owner group and sub-group', 'Users in the same visibility group,sub-groups,admins and users in the parent groups can see and edit details'),
(4, 'Entire company', 'All users in the company can see and edit the details');

INSERT INTO `team` (`team_id`, `team_name`, `team_manager`, `team_description`, `team_members`) VALUES
(1, 'Sales', 0, 'we love money', '8');
