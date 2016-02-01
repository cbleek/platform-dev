<?php
/**
 * @file
 * Agenda.
 */
?>
<div class="filter-form">
  <?php echo drupal_render($filter_form); ?>
</div>
<div class="newsroom-agenda-container">
  <?php if (count($items) > 0) : ?>
    <?php foreach ($items as $agenda_item): ?>
      <div class="date-row">
        <div class="date-date">
          <span class="day"><?php echo $agenda_item->getDate()->format('d'); ?></span>
          <span class="month"><?php echo drupal_strtoupper($agenda_item->getDate()->format('M')); ?></span>
          <span class="year"><?php echo $agenda_item->getDate()->format('Y'); ?></span>
        </div>
        <div class="date-events">
          <?php if (count($agenda_item->getItems()) > 0) : ?>
            <?php foreach ($agenda_item->getItems() as $item): ?>
              <div class="views-row clearfix">      
                <span class="newsroom_type"><?php echo $item->name; ?>: </span>
                <div class="newsroom_title">
                  <?php echo l($item->title, 'node/' . $item->nid); ?>
                </div>
                <div class="newsroom_item_metadata">
                  <?php echo t('From @start_date', array('@start_date' => $item->start_date_obj->format('d/m/Y'))); ?>
                  <?php if (!empty($item->end_date_obj)): ?>
                     <?php echo t('to @end_date', array('@end_date' => $item->end_date_obj->format('d/m/Y'))); ?>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="nothing-found"><?php echo t('No events'); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if (count($next_event_items) > 0) : ?>
    <h3><?php echo t('Further events'); ?></h3>
    <?php foreach ($next_event_items as $agenda_item): ?>
      <div class="date-row">
        <div class="date-date">
          <span class="day"><?php echo $agenda_item->getDate()->format('d'); ?></span>
          <span class="month"><?php echo drupal_strtoupper($agenda_item->getDate()->format('M')); ?></span>
          <span class="year"><?php echo $agenda_item->getDate()->format('Y'); ?></span>
        </div>
        <div class="date-events">
          <?php if (count($agenda_item->getItems()) > 0) : ?>
            <?php foreach ($agenda_item->getItems() as $item): ?>
              <div class="views-row clearfix">      
                <span class="newsroom_type"><?php echo $item->name; ?>: </span>
                <div class="newsroom_title">
                  <?php echo l($item->title, 'node/' . $item->nid); ?>
                </div>
                <div class="newsroom_item_metadata">
                  <?php echo t('From @start_date', array('@start_date' => $item->start_date_obj->format('d/m/Y'))); ?>
                  <?php if (!empty($item->end_date_obj)): ?>
                     <?php echo t('to @end_date', array('@end_date' => $item->end_date_obj->format('d/m/Y'))); ?>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="nothing-found"><?php echo t('No events'); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <?php if (!empty($navigation['previous'])): ?>
    <div class="agenda-next"><?php echo $navigation['previous']; ?></div>
  <?php endif; ?>

  <div class="date-form">
  <?php echo drupal_render($date_form); ?>
  </div>

  <?php if (!empty($navigation['next'])): ?>
    <div class="agenda-previous"><?php echo $navigation['next']; ?></div>
  <?php endif; ?>
</div>
