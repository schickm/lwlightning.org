# encoding: utf-8
#
# Jekyll site menus.
# https://github.com/MrWerewolf/jekyll-site-menus
#
# Copyright (c) 2012 Ryan Seto <mr.werewolf@gmail.com>
# Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
#
# Place this script into the _plugins directory of your Jekyll site.
#
require 'uri'

module Jekyll
  class SiteMenus < Liquid::Tag
    def initialize(tag_name, menu_name, tokens)
      super
      @menu_name = menu_name.strip!
    end

    def render(context)
      site = context.registers[:site]
      menu = site.config['menus'][@menu_name]
      level = 1

      renderMenu(context, menu, level, nil)
    end

    def renderMenu(context, menu, level, subMenuName)
      indent = "  " * (level - 1)
      output = "#{indent}"
      isFirstLvl = level == 1

      # Give this menu an id attribute if we're on the first level.
      if (isFirstLvl)
        output += "<ul id=\"#{@menu_name}-menu\" class=\"nav navbar-nav level-#{level}\">\n"
      else
        # output += "<div class=\"sub-menu level-#{level}\"><ul class=\"menu sub-menu level-#{level}\">\n"
        output += "<li class=\"dropdown\">"
        output += "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">#{subMenuName} <span class=\"caret\"></span></a>"
        output += "<ul class=\"dropdown-menu\">"
      end

      indent = "  " * (level)
      menu.each do | item |
        item.each do | name, value |
          if (value.kind_of? String)
            page_url = context.environments.first["page"]["url"]
            uri = URI(value)

            # Figure out if our menu item is currently selected.
            selected = false

            unless (uri.absolute?)
              selected = value == page_url
            end

            # Render the menu item
            output += "#{indent}<li"

            if (selected)
              output += " class=\"active\""
            end

            output += ">\n"
            output += renderMenuItem(context, name, value, level)
            output += "#{indent}</li>\n"
          elsif (value.kind_of? Array and value.size > 0)
            output += "#{indent}<li>\n"
            if (value[0].kind_of? String)
              output += renderMenuItem(context, name, value[0], level)
              submenu = value [1..value.size]
            else
              submenu = value
            end
            # Render the sub-menu
            output += renderMenu(context, submenu, level + 1, name)
            output += "#{indent}</li>\n"
          end
        end
      end

      indent = "  " * (level - 1)

      if (isFirstLvl)
        output += "#{indent}</ul>\n"
      else
        # output += "#{indent}</ul></div>\n"
        output += "#{indent}</ul></li>"
      end
    end

    def renderMenuItem(context, name, value, level)
      indent = "  " * level
      output = "#{indent}  <a href=\"#{URI.escape(value)}\">"
      output += name
      output += "</a>\n"
    end
  end

  Liquid::Template.register_tag('menu', Jekyll::SiteMenus)
end