import { registerBlockType } from "@wordpress/blocks";
import { useBlockProps } from "@wordpress/block-editor";

registerBlockType("custom/unique-separator", {
  edit: function () {
    return <div className="separator"></div>;
  },
  save: function () {
    return <div className="separator"></div>;
  },
});
